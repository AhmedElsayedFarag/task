<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\SocialLoginRequest;
use App\Http\Resources\UserResource;
use App\Models\PhoneCode;
use App\Models\SocialUser;
use App\Models\User;
use App\Traits\apiResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use apiResponseTrait;

    public function social_login(SocialLoginRequest $request){
        //search if user exists
        $social_user = SocialUser::where('social_id',$request->social_id)->first();
        if ($social_user){
            $user = User::withTrashed()->findOrFail($social_user->user_id);
            if ($user->blocked == 1){
                return $this->apiResponse(config('globals.error_code'),[],[trans('messages.user_blocked')]);
            }
            if ($user->deleted_at){
                $user->deleted_at = null;
                $user->save();
            }
            if ($request->device_token){
                $user->device_token = $request->device_token;
                $user->save();
            }
        }else{
            $user = User::create($request->except('social_id','social_type'));
            $social = new SocialUser();
            $social->user_id = $user->id;
            $social->social_id = $request->social_id;
            $social->social_type = $request->social_type;
            $social->save();
        }//end else
        $accessToken = $user->createToken('authToken')->accessToken;

        activity()
            ->causedBy($user)
            ->log('Social Login');

        return $this->apiResponse(config('globals.success_code'),[
            'token' => $accessToken,
            'user' => new UserResource(User::findOrFail($user->id))
        ],[]);

    }
    public function register(RegisterRequest $request){
        $user = User::create($request->except('password_confirmation'));
//        $accessToken = $user->createToken('authToken')->accessToken;
        //send phone code
        $code = new PhoneCode();
        $code->user_id = $user->id;
        $code->code = '0000';
        $code->save();
        activity()
            ->causedBy($user)
            ->log('Register');
        return $this->apiResponse(config('globals.success_code'),trans('messages.sms_sent'),[]);

    }
    public function login(LoginFormRequest $request)
    {
        $user = User::where('phone', $request->phone)->first();


        if ($user && Hash::check($request->password, $user->password)) {

            if ($user->blocked == 1){
                return $this->apiResponse(config('globals.error_code'),[],[trans('messages.user_blocked')]);
            }

            if ($user->phone_verified_at == null){
                return $this->apiResponse(config('globals.not_verified_phone'),[],[trans('messages.phone_not_verified')]);
            }

            if ($request->device_token){
                $user->device_token = $request->device_token;
                $user->save();
            }

            $accessToken = $user->createToken('authToken')->accessToken;
            activity()
                ->causedBy($user)
                ->log('Login');
            return $this->apiResponse(config('globals.success_code'),[
                'token' => $accessToken,
                'user' => new UserResource(User::findOrFail($user->id))
            ],[]);

        }else{
            return $this->apiResponse(config('globals.error_code'),[],[trans('messages.incorrect_password')]);
        }
    }//end login
    public function checkOtp(Request $request){
        $user = User::where('phone', $request->phone)->first();
        if ($user) {
            //check code
            $code = PhoneCode::where([
                ['user_id',$user->id],['code',$request->code]
            ])->first();
            if($code){
                if ($request->device_token){
                    $user->device_token = $request->device_token;
                    $user->save();
                }
                $code->delete();
                $user->phone_verified_at = Carbon::now()->toDateTimeString();
                $user->save();
                $accessToken = $user->createToken('authToken')->accessToken;
                return $this->apiResponse(config('globals.success_code'),[
                    'token' => $accessToken,
                    'user' => new UserResource(User::findOrFail($user->id))
                ],[]);
            }else{
                return $this->apiResponse(config('globals.error_code'),[],[trans('messages.code_is_wrong')]);
            }
        }else{
            return $this->apiResponse(config('globals.error_code'),[],[trans('messages.phone_is_wrong')]);
        }
    }
    public function checkMailOtp(Request $request){
        $user = User::where('email', $request->email)->first();
        if ($user) {
            //check code
            $code = PhoneCode::where([
                ['user_id',$user->id],['code',$request->code]
            ])->first();
            if($code){
                if ($request->device_token){
                    $user->device_token = $request->device_token;
                    $user->save();
                }
                $code->delete();
                $user->email_verified_at = Carbon::now()->toDateTimeString();
                $user->save();
                $accessToken = $user->createToken('authToken')->accessToken;
                return $this->apiResponse(config('globals.success_code'),[
                    'token' => $accessToken,
                    'user' => new UserResource(User::findOrFail($user->id))
                ],[]);
            }else{
                return $this->apiResponse(config('globals.error_code'),[],[trans('messages.code_is_wrong')]);
            }
        }else{
            return $this->apiResponse(config('globals.error_code'),[],[trans('messages.email_is_wrong')]);
        }
    }
    public function logout(Request $request){
        $user= auth()->user();
        $user->device_token = null;
        $user->save();
        $user = Auth::user()->token();
        $user->revoke();
        return $this->apiResponse(config('globals.success_code'),trans('messages.logout_successfully'),[]);
    }
}
