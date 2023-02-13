<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OptionValueTranslation
 *
 * @property int $id
 * @property int $option_value_id
 * @property string $locale
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation whereOptionValueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValueTranslation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OptionValueTranslation extends Model
{
    use HasFactory;
}
