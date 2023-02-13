<?php

namespace App\Http\Resources;

use App\Models\Ad;
use App\Models\AdFavourite;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\SocialUser;
use App\Models\UserFollow;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray($request)
    {
        $data =  [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'image' => (filter_var($this->image, FILTER_VALIDATE_URL) === true)?$this->image:asset($this->image),
//            'device_token' => $this->device_token,
            'email_verified_at' => $this->email_verified_at,
            'phone_verified_at' => $this->phone_verified_at,
            'rating' => ($this->rating->avg('stars'))?$this->rating->avg('stars'):0,
            'rating_count' => ($this->rating->count())?$this->rating->count():0,
            'bought_ads' => Ad::where('buyer_id',$this->id)->count(),
            'sold_ads' => Ad::where('user_id',$this->id)->count(),
            'following' => $this->followings->count(),
            'followers' => $this->followers->count(),
            'is_followed' => 0,
            'unread_notifications' => $this->unreadNotifications->count(),
            'unread_messages' => ChatMessage::whereIn('chat_id',Chat::where('sender_id',$this->id)->orWhere('owner_id',$this->id)->pluck('id')->toArray())->where('sender_id','!=',$this->id)->where('read_at',null)->count(),
            'unread_conversations' => 0,
            'birth_date' => $this->birth_date,
            'has_password' => ($this->password)?true:false,
            'is_social' => (SocialUser::where('user_id',$this->id)->count())?true:false,
//            'ads' => HomeAdResource::collection(Ad::where('user_id',$this->id)->where('status',1)->orderBy('id','DESC')->get()),
//            'draft_ads' => HomeAdResource::collection(Ad::where('user_id',$this->id)->where('status',2)->orderBy('id','DESC')->get()),
//            'archived_ads' => HomeAdResource::collection(Ad::where('user_id',$this->id)->where('status',3)->orderBy('id','DESC')->get()),
//            'notifications' => $this->unReadNotifications->count(),
//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at,
        ];
//        $fav_ads = AdFavourite::where('user_id',$this->id)->pluck('ad_id')->toArray();
//        $data['favourite_ads'] = HomeAdResource::collection(Ad::whereIn('id',$fav_ads)->where('status',1)->orderBy('id','DESC')->get());
        if (auth('api')->check()){
            $data['is_followed'] = UserFollow::where([['followed_id',$this->id],['follower_id',auth('api')->id()]])->count();
        }
        //get unreadMessagesCount
        $chats = Chat::where('owner_id',$this->id)->orWhere('sender_id',$this->id)->get();
        foreach ($chats as $chat){
            //get chat last messages
            $last_chat_message = ChatMessage::where([
                ['chat_id',$chat->id],['sender_id','!=',$this->id]
            ])->orderBy('id','desc')->first();
            if ($last_chat_message && !$last_chat_message->read_at){
                $data['unread_conversations']++;
            }//end if
        }//end foreach
        return $data;
    }
}
