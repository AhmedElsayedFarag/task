<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ReportReasonTranslation
 *
 * @property int $id
 * @property int $report_reason_id
 * @property string $locale
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation whereReportReasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportReasonTranslation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ReportReasonTranslation extends Model
{
    use HasFactory;
}
