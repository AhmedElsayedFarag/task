<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AdFavourite
 *
 * @property int $id
 * @property int $ad_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite whereAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdFavourite whereUserId($value)
 * @mixin \Eloquent
 */
class AdFavourite extends Model
{
    use HasFactory;
}
