<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ReportReason
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ReportReasonTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ReportReasonTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason translated()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReason withTranslation()
 * @mixin \Eloquent
 */
class ReportReason extends Model
{
    use HasFactory,Translatable;
    public $translatedAttributes = ['name'];
    protected $guarded = [];
}
