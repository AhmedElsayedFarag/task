<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OptionTranslation
 *
 * @property int $id
 * @property int $option_id
 * @property string $locale
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionTranslation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OptionTranslation extends Model
{
    use HasFactory;
}
