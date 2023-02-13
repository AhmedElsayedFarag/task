<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AdOption
 *
 * @property int $id
 * @property int $option_id
 * @property int $ad_id
 * @property string $option_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption whereAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption whereOptionValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdOption whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdOption extends Model
{
    use HasFactory;
}
