<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AdReport
 *
 * @property int $id
 * @property int $ad_id
 * @property int $report_reason_id
 * @property int $user_id
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport whereAdId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport whereReportReasonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdReport whereUserId($value)
 * @mixin \Eloquent
 */
class AdReport extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function ad(){
        return $this->belongsTo(Ad::class);
    }
    public function reason(){
        return $this->belongsTo(ReportReason::class,'report_reason_id');
    }
}
