<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PhoneCode
 *
 * @property int $id
 * @property int $user_id
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $data
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PhoneCode whereUserId($value)
 * @mixin \Eloquent
 */
class PhoneCode extends Model
{
    use HasFactory;
}
