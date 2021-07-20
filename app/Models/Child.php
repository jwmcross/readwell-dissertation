<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Child extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Auditable;

    public $table = 'children';

    public const AGE_GROUP_SELECT = [
        '1'=>'Under 2s',
        '2'=>'2 year olds',
        '3'=>'Preschool',
    ];

    public $orderable = [
        'id',
        'firstname',
        'lastname',
        'middlenames',
        'date_of_birth',
        'age_group',
        'family.family_name',
    ];

    public $filterable = [
        'id',
        'firstname',
        'lastname',
        'middlenames',
        'date_of_birth',
        'age_group',
        'family.family_name',
    ];

    protected $dates = [
        'date_of_birth',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'firstname',
        'lastname',
        'middlenames',
        'date_of_birth',
        'age_group',
        'family_id',
    ];

    protected $with = ['booking'];

    public function registers()
    {
        return $this->belongsToMany(Register::class, 'child_register', 'child_id','register_id')
            ->using(ChildRegister::class)
            ->as('japan')
            ->withPivot(['register_id','child_id', 'in_time', 'out_time','session'])
            ->withTimestamps();
    }

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class, 'child_id');
    }

    public function getAgeAttribute()
    {
        //return $this->attributes['date_of_birth'] ? Carbon::parse($this->attributes['date_of_birth'])->form() : null;
        return $this->attributes['date_of_birth']
            ? Carbon::parse($this->attributes['date_of_birth'])->diff(now())->format('%y Years, %m Months Old')
            : null;
    }

    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

//    public function setAgeGroupAttribute()
//    {
//        dd($this->age_group);
//        if(is_null($this->age_group) || $this->age_group == 0) return null;
//        return array_search($this->attributes['age_group'], static::AGE_GROUP_SELECT);
//    }

    public function getAgeGroupAttribute()
    {
        //return $this->attributes['date_of_birth'] ? Carbon::parse($this->attributes['date_of_birth'])->form() : null;
        return static::AGE_GROUP_SELECT[$this->attributes['age_group']] ?? null;
    }

    public function getAgeYearAttribute()
    {
        return $this->attributes['date_of_birth']
            ? Carbon::parse($this->attributes['date_of_birth'])->diff(now())->format('%y')
            : null;
    }

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d M Y') : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        //dd($value);
        $this->attributes['date_of_birth'] = $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }

    public function getBirthdayAttribute()
    {
        return $this->attributes['date_of_birth']
            ? Carbon::parse($this->attributes['date_of_birth'])->isBirthday()
            : null;
    }

//    public function getAgeGroupLabelAttribute($value)
//    {
//        return static::AGE_GROUP_SELECT[$this->age_group] ?? null;
//    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

//    public function scopeAgeBetween($query, $minage, $maxage)
//    {
//        $dob = $this->attributes['date_of_birth'];
//
//        return $query
//            ->where('date_of_birth', function($query) use($minage){
//                $query->whereYear('date_of_birth', $minage);
//            })
//            ->orWhere('date_of_birth', function($query) use($maxage){
//                $query->whereYear('date_of_birth', $maxage);
//            });
//
//    }
}
