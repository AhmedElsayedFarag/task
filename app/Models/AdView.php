<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AdView
 *
 * @property int $id
 * @property string|null $ip
 * @property int $user_id
 * @property int $ad_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdView newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdView newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdView query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdView whereAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdView whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdView whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdView whereIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdView whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdView whereUserId($value)
 * @mixin \Eloquent
 */
class AdView extends Model
{
    use HasFactory;
}
