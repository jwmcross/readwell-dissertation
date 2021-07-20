<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Register extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;

    public const AGE_GROUP_SELECT = [
        '1'=>'Under 2s',
        '2'=>'2 year olds',
        '3'=>'Preschool',
    ];

    public const SESSION_SELECT = [
        '1'  => 'Under 2s',
        '2'  => '2 year olds',
        '3'  => 'Preschool',
    ];

    public $table = 'registers';

    public $orderable = [
        'id',
        'title',
        'register_date',
        'start_time',
        'end_time',
        'age_group',
    ];

    public $filterable = [
        'id',
        'title',
        'register_date',
        'start_time',
        'end_time',
        'age_group',
        'child.firstname',
    ];

    protected $dates = [
        'register_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'register_date',
        'start_time',
        'end_time',
        'age_group',
    ];

    protected $with = ['children'];

    public function children()
    {
        return $this->belongsToMany(Child::class, 'child_register', 'register_id', 'child_id')
            ->using(ChildRegister::class)
            ->as('attendance')
            ->withPivot(['register_id','child_id', 'in_time', 'out_time','session', 'absence'])
            ->withTimestamps();
    }

    public function scopeTodaysRegister($query)
    {
        return $query->where('register_date', today());
    }

    public function scopeUnderTwoYearOlds($query)
    {
        return $query->where('age_group', 1);
    }

    public function scopeTwoYearOlds($query)
    {
        return $query->where('age_group', 2);
    }

    public function scopePreschool($query)
    {
        return $query->where('age_group', 3);
    }

    public function childrenCount()
    {
        return $this->belongsToMany(Child::class, 'child_register', 'register_id', 'child_id')
            ->using(ChildRegister::class)
            ->withPivot(['register_id','child_id'])
            ->groupBy('child_id');
    }

    public function getChildrenCountAttribute()
    {

    }

    public function morningSession()
    {
        return $this->belongsToMany(Child::class, 'child_register', 'register_id', 'child_id')
            ->using(ChildRegister::class)
            //->as('attendance')
            ->wherePivot('session', 1)
            ->withPivot(['register_id','child_id', 'in_time', 'out_time','session', 'absence'])
            ->withTimestamps();
    }

    public function afternoonSession()
    {
        return $this->belongsToMany(Child::class, 'child_register', 'register_id', 'child_id')
            ->as('attendance')
            ->wherePivot('session', 2)
            ->withPivot(['register_id','child_id', 'in_time', 'out_time','session', 'absence'])
            ->withTimestamps();
    }

    public function fullDaySession()
    {
        return $this->belongsToMany(Child::class, 'child_register', 'register_id', 'child_id')
            ->as('attendance')
            ->wherePivot('child_id', '' , '', '', '')
            ->withPivot(['register_id','child_id', 'in_time', 'out_time','session', 'absence'])
            ->withTimestamps();
    }

    public function getRegisterDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('D d F, Y') : null;
    }

    public function setRegisterDateAttribute($value)
    {
        $this->attributes['register_date'] =$value ? Carbon::parse($value)->format('Y-m-d') : null;
    }

    public function getAgeGroupLabelAttribute($value)
    {
        return static::AGE_GROUP_SELECT[$this->age_group] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
