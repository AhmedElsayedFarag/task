<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FaqTranslation
 *
 * @property int $id
 * @property int $faq_id
 * @property string $locale
 * @property string $name
 * @property string $answer
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation whereAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation whereFaqId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqTranslation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FaqTranslation extends Model
{
    use HasFactory;
}
