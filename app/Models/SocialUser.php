<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SocialUser
 *
 * @property int $id
 * @property int $user_id
 * @property string $social_id
 * @property string $social_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser whereSocialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser whereSocialType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialUser whereUserId($value)
 * @mixin \Eloquent
 */
class SocialUser extends Model
{
    use HasFactory;

}
