<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\OptionValue
 *
 * @property int $id
 * @property int $option_id
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\OptionValueTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OptionValueTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue query()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue translated()
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OptionValue withTranslation()
 * @mixin \Eloquent
 */
class OptionValue extends Model
{
    use HasFactory,Translatable;
    public $translatedAttributes = ['name'];
    protected $guarded = [];
}
