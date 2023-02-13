<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Http\Resources\NotificationsResource;
use App\Http\Resources\UserResource;
use App\Models\Chat;
use App\Models\PhoneCode;
use App\Models\User;
use App\Models\UserFollow;
use App\Models\UserRating;
use App\Notifications\DefaultUserNotification;
use App\Traits\apiResponseTrait;
use App\Traits\createRandomCodeTrait;
use App\Traits\firebaseNotificationTrait;
use App\Traits\sendSmsTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use sendSmsTrait, createRandomCodeTrait, apiResponseTrait, firebaseNotificationTrait;

    public function sendOtp(Request $request)
    {
        $user = User::where('phone', $request->phone)->first();
        if ($user) {
            //check if has other codes
            $codes = PhoneCode::where('user_id', $user->id)->delete();
            //send phone code
            $code = new PhoneCode();
            $code->user_id = $user->id;
            $code->code = '0000';
            $code->save();
            return $this->apiResponse(config('globals.success_code'), trans('messages.sms_sent'), []);
        } else {
            return $this->apiResponse(config('globals.error_code'), [], [trans('messages.phone_is_wrong')]);
        }


    }

    public function sendUpdateOtp(Request $request)
    {
        $user = User::where('phone', $request->data)->orWhere('email', $request->data)->first();
        if ($user) {
            return $this->apiResponse(config('globals.error_code'), [], [trans('messages.already_exists')]);
        } else {
            $user = auth()->user();
            //check if has other codes
            $codes = PhoneCode::where('user_id', $user->id)->delete();
            //send phone code
            $code = new PhoneCode();
            $code->user_id = $user->id;
            $code->code = '0000';
            $code->data = $request->data;
            $code->save();
            return $this->apiResponse(config('globals.success_code'), trans('messages.sms_data_sent'), []);
        }


    }

    public function checkUpdateOtp(Request $request)
    {
        $user = auth()->user();
        $code = PhoneCode::where([
            ['user_id', $user->id], ['code', $request->code], ['data', $request->data]
        ])->first();
        if ($code) {
            if ($request->device_token) {
                $user->device_token = $request->device_token;
                $user->save();
            }
            $code->delete();
            if(filter_var($request->data, FILTER_VALIDATE_EMAIL)) {
                // valid address
                $user->email = $request->data;
                $user->email_verified_at = Carbon::now()->toDateTimeString();
            }
            else {
                $user->phone = $request->data;
                $user->phone_verified_at = Carbon::now()->toDateTimeString();
            }
            $user->save();
            $accessToken = $user->createToken('authToken')->accessToken;
            return $this->apiResponse(config('globals.success_code'), [
                'token' => $accessToken,
                'user' => new UserResource(User::findOrFail($user->id))
            ], []);
        } else {
            return $this->apiResponse(config('globals.error_code'), [], [trans('messages.code_is_wrong')]);
        }
    }

    public function sendMailOtp(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            //check if has other codes
            $codes = PhoneCode::where('user_id', $user->id)->delete();
            //send phone code
            $code = new PhoneCode();
            $code->user_id = $user->id;
            $code->code = '0000';
            $code->save();
            return $this->apiResponse(config('globals.success_code'), trans('messages.email_sent'), []);
        } else {
            return $this->apiResponse(config('globals.error_code'), [], [trans('messages.email_is_wrong')]);

        }


    }

    public function reset_password(ResetPasswordRequest $request)
    {
        $user = auth()->user();
        $user->password = $request->password;
        $user->save();
        $accessToken = $user->createToken('authToken')->accessToken;
        return $this->apiResponse(config('globals.success_code'), [
            'token' => $accessToken,
            'user' => new UserResource(User::findOrFail($user->id))
        ], []);
    }//end new_password

    public function changePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();
        if (Hash::check($request->old_password, $user->password)) {
            $user->password = $request->password;
            $user->save();
            $accessToken = $user->createToken('authToken')->accessToken;
            return $this->apiResponse(config('globals.success_code'), [
                'token' => $accessToken,
                'user' => new UserResource(User::findOrFail($user->id))
            ], []);
        } else {
            return $this->apiResponse(config('globals.error_code'), [], [trans('messages.password_is_wrong')]);

        }

    }

    public function update_profile(Request $request)
    {
        $user = auth('api')->user();
        if ($request->has('phone') && $request->phone != $user->phone) {
            $user = $user->update($request->all());
            //send phone code
            $code = new PhoneCode();
            $code->user_id = $user->id;
            $code->code = '0000';
            $code->save();
            //log out user to verify phone
            $user = Auth::user()->token();
            $user->revoke();
            return $this->apiResponse(config('globals.success_code'), trans('messages.sms_sent'), []);
        } else {
            $user->fill($request->all())->save();
            return $this->apiResponse(config('globals.success_code'), new UserResource($user->refresh()), []);
        }

    }

    public function rateUser(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $rate = new UserRating();
        $rate->user_id = $user->id;
        $rate->ad_id = $request->ad_id;
        $rate->reviewer_id = auth('api')->id();
        $rate->stars = $request->stars;
        $rate->save();
        activity()
            ->causedBy(auth()->user())
            ->performedOn($user)
            ->log(auth()->user()->name.' has Rate seller'.$user->name.' By'.$request->stars);
        return $this->apiResponse(config('globals.success_code'), trans('messages.saved_successfully'), []);

    }

    public function userProfile($id)
    {
        $user = User::findOrFail($id);
        return $this->apiResponse(config('globals.success_code'), new UserResource($user), []);
    }//end userProfile

    public function updateDeviceToken(Request $request)
    {
        $user = auth()->user();
        if ($request->device_token) {
            $user->device_token = $request->device_token;
            $user->save();
        }
        return $this->apiResponse(config('globals.success_code'), trans('messages.saved_successfully'), []);
    }

    public function followUser(Request $request)
    {
        $follow = UserFollow::where('follower_id', auth()->id())->where('followed_id', $request->user_id)->first();
        if ($follow) {
            //unfollow
            //firebase update notifications count
            app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage("users/" . auth('api')->id(), UserResource::make(User::find(auth('api')->id()))->resolve());
            app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage("users/" . $request->user_id, UserResource::make(User::find($request->user_id))->resolve());
            $follow->delete();
            return $this->apiResponse(config('globals.success_code'), trans('messages.removed_successfully'), []);
        } else {
            //follow
            $follow = new UserFollow();
            $follow->follower_id = auth()->id();
            $follow->followed_id = $request->user_id;
            $follow->save();
            //send notification to followed user
            $user = User::find($request->user_id);
            $notification_data = [
                'user_id' => auth()->id(),
                'type' => 'follow',
                'url' => url('user-profile/' . auth()->id()),
            ];
            $user->notify(new DefaultUserNotification($notification_data));
            //send push firebase notification
            $this->sendNotification([$user->device_token], 'follow', $notification_data);
            //firebase update notifications count
            app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage("users/" . auth('api')->id(), UserResource::make(User::find(auth('api')->id()))->resolve());
            app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage("users/" . $request->user_id, UserResource::make(User::find($request->user_id))->resolve());

            activity()
                ->causedBy(auth()->user())
                ->performedOn($user)
                ->log(auth()->user()->name.' has followed '.$user->name);
            return $this->apiResponse(config('globals.success_code'), trans('messages.saved_successfully'), []);
        }
    }//end followUser

    public function userFollowers(Request $request)
    {
        $user = auth('api')->user();
//        $followers = UserFollow::where('followed_id', $user->id)->pluck('follower_id')->toArray();
//        $followers = User::whereIn('id', $followers)->get();
        return $this->apiResponse(config('globals.success_code'), UserResource::collection($user->followers), []);
    }//end userFollowers

    public function deleteUserFollower(Request $request)
    {
        $user = auth('api')->user();
        $follower = UserFollow::where('followed_id', $user->id)->where('follower_id', $request->follower_id)->delete();
        return $this->apiResponse(config('globals.success_code'), trans('messages.removed_successfully'), []);
    }

    public function userFollowings(Request $request)
    {
        $user = auth('api')->user();
//        $followers = UserFollow::where('follower_id', $user->id)->pluck('followed_id')->toArray();
//        $followers = User::whereIn('id', $followers)->get();
        return $this->apiResponse(config('globals.success_code'), UserResource::collection($user->followings), []);
    }//end userFollowings

    public function notifications()
    {
        $user = auth('api')->user();
        $notifications = $user->notifications;
        return $this->apiResponse(config('globals.success_code'), NotificationsResource::collection($notifications), []);

    }

    public function readNotification(Request $request)
    {
        $user = auth('api')->user();
        $notification = $user->notifications()->where('id', $request->id)->update(['read_at' => now()]);
        app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage("users/" . auth('api')->id(), UserResource::make(User::find(auth('api')->id()))->resolve());
        return $this->apiResponse(config('globals.success_code'), NotificationsResource::collection($user->notifications), []);
    }

    public function removeAccount()
    {
        $user = auth()->user();
        $user->device_token = null;//not to send notifications
        $user->save();
        $user->ads()->delete();//delete user ads
        //remove chats belongs to that user
        Chat::where('owner_id',$user->id)
            ->orWhere('sender_id',$user->id)->delete();
        $user->token()->revoke();//logout
        $user->forceDelete();
        return $this->apiResponse(config('globals.success_code'), trans('messages.saved_successfully'), []);
    }//end removeAccount
}
