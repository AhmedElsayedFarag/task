<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class NotificationsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'id'=>$this->id,
            'data'=>$this->data,
            'read_at'=>$this->read_at,
            'posted_at'=>$this->created_at->diffForHumans(),
        ];
        if (isset($this->data['user_id'])){
            $user = User::find($this->data['user_id']);
            if ($user){
                $image = (filter_var($user->image, FILTER_VALIDATE_URL) === true)?$user->image:asset($user->image);
                $data['data']['user_image'] = $image;
            }else{
                $data['data']['user_image'] = '';
            }
        }
        if ($this->data['type'] == 'follow'){
            if (isset($user)){
                $data['text'] =$user->first_name.' '.$user->last_name.' '.trans('messages.start_follow');
            }else{
                $data['text'] = '';
            }
            $data['title'] = trans('messages.'.$this->data['type']);
        }elseif ($this->data['type'] == 'offer'){
            if (isset($user)){
                $data['text'] =$user->first_name.' '.$user->last_name.' '.trans('messages.sent_offer');
            }else{
                $data['text'] = '';
            }
            $data['title'] = trans('messages.'.$this->data['type']);
        }elseif ($this->data['type'] == 'message'){
            if (isset($user)){
                $data['text'] =$user->first_name.' '.$user->last_name.' '.trans('messages.sent_message');
            }else{
                $data['text'] = '';
            }
            $data['title'] = trans('messages.'.$this->data['type']);
        }

        return $data;
    }
}
