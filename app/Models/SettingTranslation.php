<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SettingTranslation
 *
 * @property int $id
 * @property int $setting_id
 * @property string $locale
 * @property string $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereSettingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingTranslation whereValue($value)
 * @mixin \Eloquent
 */
class SettingTranslation extends Model
{
    use HasFactory;
}
