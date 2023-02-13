<?php

namespace App\Http\Resources;

use App\Models\AdView;
use App\Models\Chat;
use App\Models\User;
use App\Models\UserRating;
use Illuminate\Http\Resources\Json\JsonResource;

class SellingAdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'image' => ($this->image) ? asset($this->image) : null,
            'price' => $this->price,
            'share_link' => url("api/ad-details/$this->id"),
            'title'=>$this->title,
            'conversations_count'=>Chat::where('ad_id',$this->id)->count(),
            'views_count'=>AdView::where('ad_id',$this->id)->count(),
            'sold'=>$this->sold,
            'is_rated'=>(UserRating::where('ad_id',$this->id)->first())?1:0,
            'buyer'=>new UserResource(User::find($this->buyer_id)),
        ];
        return $data;
    }
}
