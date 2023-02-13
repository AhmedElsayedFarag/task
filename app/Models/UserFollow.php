<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserFollow
 *
 * @property int $id
 * @property int $follower_id
 * @property int $followed_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow whereFollowedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow whereFollowerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserFollow whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserFollow extends Model
{
    use HasFactory;
}
