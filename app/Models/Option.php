<?php

namespace App\Models;

use App\Traits\saveImageTrait;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Option
 *
 * @property int $id
 * @property string $input_type
 * @property string|null $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\OptionTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OptionTranslation[] $translations
 * @property-read int|null $translations_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\OptionValue[] $values
 * @property-read int|null $values_count
 * @method static \Illuminate\Database\Eloquent\Builder|Option listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Option query()
 * @method static \Illuminate\Database\Eloquent\Builder|Option translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Option translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereInputType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option withTranslation()
 * @mixin \Eloquent
 */
class Option extends Model
{
    use HasFactory,Translatable,saveImageTrait;
    public $translatedAttributes = ['name'];
    protected $guarded = [];
    public function setIconAttribute($value){
        if ($value){
            $this->attributes['icon']=$this->saveImage($value,'options');
        }
    }
    public function values(){
        return $this->hasMany(OptionValue::class);
    }
}
