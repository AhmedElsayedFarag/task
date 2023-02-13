<?php

namespace App\Http\Resources;

use App\Models\Ad;
use App\Models\AdFavourite;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data =  [
            'id'=>$this->id,
            'image'=>($this->image)?asset($this->image):null,
            'images'=>$this->images()->orderBy('is_cover','DESC')->get(),
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price,
            'user_id'=>$this->user_id,
            'user'=>new UserResource(User::find($this->user_id)),
//            'category_id'=>$this->category_id,
            'category'=>new CategryResource(Category::find(Category::find($this->category_id)->parent_id)),
            'sub_category'=>new CategryResource(Category::find($this->category_id)),
            'lat'=>$this->lat,
            'lng'=>$this->lng,
            'status'=>$this->status,
            'sold'=>$this->sold,
            'buyer_id'=>$this->buyer_id,
            'buyer'=>new UserResource(User::find($this->buyer_id)),
            'options'=>AdOptionResource::collection($this->ad_options),
            'created_at'=>$this->created_at,
            'posted_at'=>$this->created_at->diffForHumans(),
            'share_link'=>"http://137.184.140.178/product/$this->id",
//            'share_link'=>url("api/ad-details/$this->id"),
        ];
        if (auth('api')->check()){
            $data['is_favourite'] = (AdFavourite::where([
                ['user_id',auth('api')->id()],['ad_id',$this->id]
            ])->first())?1:0;
        }else{
            $data['is_favourite'] = 0;
        }

        return $data;
    }
}
