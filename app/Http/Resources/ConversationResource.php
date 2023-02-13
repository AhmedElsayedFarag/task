<?php

namespace App\Http\Resources;

use App\Models\Ad;
use App\Models\ChatMessage;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class ConversationResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'sender'=>($this->sender_id == auth('api')->id())?new UserResource(User::find($this->owner_id)):new UserResource(User::find($this->sender_id)),
            'ad'=>new HomeAdResource(Ad::find($this->ad_id)),
//            'owner'=>new UserResource(User::find($this->owner_id)),
            'last_message'=>ChatMessage::where('chat_id',$this->id)->orderBy('id','desc')->first(),
            'last_message_date'=>(ChatMessage::where('chat_id',$this->id)->orderBy('id','desc')->first())?ChatMessage::where('chat_id',$this->id)->orderBy('id','desc')->first()->created_at->diffForHumans():'',

        ];
    }
}
