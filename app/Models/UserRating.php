<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserRating
 *
 * @property int $id
 * @property int $user_id
 * @property int $stars
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $reviewer_id
 * @property int $ad_id
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereReviewerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereStars($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRating whereUserId($value)
 * @mixin \Eloquent
 */
class UserRating extends Model
{
    use HasFactory;
}
