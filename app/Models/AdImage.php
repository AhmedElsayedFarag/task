<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AdImage
 *
 * @property int $id
 * @property int $ad_id
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $is_cover
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage whereAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage whereIsCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdImage whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdImage extends Model
{
    use HasFactory;
}
