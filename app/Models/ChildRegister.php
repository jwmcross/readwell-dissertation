<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ChildRegister extends Pivot
{
    use HasFactory;
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing  = true;

    public const AGE_GROUP_SELECT = [
        '1' =>'Under 2s',
        '2' =>'2 year olds',
        '3' =>'Preschool',
    ];

    public const SESSION_SELECT = [
        '1'  => 'Morning',
        '2'  => 'Afternoon',
        '3'  => 'All Day',
    ];

    protected $dates = [
        'in_time',
        'out_time,'
    ];

    public function getSessionAttribute()
    {
        return static::SESSION_SELECT[$this->attributes['session']] ?? 'N/A';
    }

    public function setInTimeAttribute($value)
    {
        return $this->attributes['in_time'] = $value ? Carbon::parse($value)->format('H:m') . ':00' : null;
    }
}
