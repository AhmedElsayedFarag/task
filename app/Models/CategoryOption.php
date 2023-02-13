<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CategoryOption
 *
 * @property int $id
 * @property int $category_id
 * @property int $option_id
 * @property int $required
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption whereRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryOption whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CategoryOption extends Model
{
    use HasFactory;
}
