<?php

namespace App\Models;

use App\Traits\saveImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Ad
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $title
 * @property string|null $description
 * @property float $price
 * @property int $user_id
 * @property int $category_id
 * @property float|null $lat
 * @property float|null $lng
 * @property int $status
 * @property int $sold
 * @property int|null $buyer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AdOption[] $ad_options
 * @property-read int|null $ad_options_count
 * @property-read \App\Models\User|null $buyer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\AdImage[] $images
 * @property-read int|null $images_count
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Ad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ad newQuery()
 * @method static \Illuminate\Database\Query\Builder|Ad onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ad query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereBuyerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereSold($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ad whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|Ad withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Ad withoutTrashed()
 * @mixin \Eloquent
 */
class Ad extends Model
{
    use HasFactory,saveImageTrait,SoftDeletes;
    protected $guarded = [];
//    public function setImageAttribute($value){
//        $this->saveImage($value,'ads');
//    }
    public function ad_options(){
        return $this->hasMany(AdOption::class);
    }
    public function images(){
        return $this->hasMany(AdImage::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function buyer(){
        return $this->belongsTo(User::class,'buyer_id');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
