<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Auditable;

    public const MONDAY_SELECT = [
        '1'   =>  'Morning',
        '2'   =>  'Afternoon',
        '3'   =>  'Full Day',
        '4'   =>  'No Booking',
    ];

    public const FRIDAY_SELECT = [
        'Morning'   =>  'Morning',
        'Afternoon'   =>  'Afternoon',
        'Full Day'   =>  'Full Day',
        'No Booking'   =>  'No Booking',
    ];

    public const TUESDAY_SELECT = [
        'Morning'   =>  'Morning',
        'Afternoon'   =>  'Afternoon',
        'Full Day'   =>  'Full Day',
        'No Booking'   =>  'No Booking',
    ];

    public const THURSDAY_SELECT = [
        'Morning'   =>  'Morning',
        'Afternoon'   =>  'Afternoon',
        'Full Day'   =>  'Full Day',
        'No Booking'   =>  'No Booking',
    ];

    public const WEDNESDAY_SELECT = [
        'Morning'   =>  'Morning',
        'Afternoon'   =>  'Afternoon',
        'Full Day'   =>  'Full Day',
        'No Booking'   =>  'No Booking',
    ];

    public const BOOKING_TYPES = [
        '1'   =>  'Morning',
        '2'   =>  'Afternoon',
        '3'   =>  'Full Day',
        '4'   =>  'No Booking',
    ];

    public const BOOKING_LABELS = [
        'Morning'   =>  '1',
        'Afternoon'   =>  '2',
        'Full Day'   =>  '3',
        'No Booking'   =>  '4',
    ];

    public $table = 'bookings';

    public $orderable = [
        'id',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'child.firstname',
    ];

    public $filterable = [
        'id',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'child.firstname',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'child_id',
    ];

    public function formatBooking() : array
    {
        $thisbooking = [];
        $thisbooking['monday']      = $this->monday ?? null;
        $thisbooking['tuesday']     = $this->tuesday ?? null;
        $thisbooking['wednesday']   = $this->wednesday ?? null;
        $thisbooking['thursday']    = $this->thursday ?? null;
        $thisbooking['friday']      = $this->friday ?? null;

        $filteredBookings = array_filter($thisbooking, function($index){
            $check = ($index == 0 || is_null($index)) ? false : true;
            return $check;
        });

        $bookings = [];
        foreach($filteredBookings as $key => $value) {

            $bookings[$value] = static::BOOKING_TYPES[$value] ?? null;
        }

        return $bookings;
    }

    public function bookings()
    {
        $days['monday'] = static::MONDAY_SELECT[$this->attributes['monday']] ?? null;
        $days['tuesday'] = static::MONDAY_SELECT[$this->attributes['tuesday']] ?? null;
        $days['wednesday'] = static::MONDAY_SELECT[$this->attributes['wednesday']] ?? null;
        $days['thursday'] = static::MONDAY_SELECT[$this->attributes['thursday']] ?? null;
        $days['friday'] = static::MONDAY_SELECT[$this->attributes['friday']] ?? null;

        $days = array_filter($days, function($row){
            return !is_null($row) || $row;
        });

//        foreach($days as $key => $value){
//            $bookings[$key] = static::BOOKING_TYPES[$value] ?? null;
//        }
        return $days;
    }

    public function getMondayAttribute()
    {
        return $this->attributes['monday'];
    }

    public function getMondayLabelAttribute($value)
    {
        return static::MONDAY_SELECT[$value] ?? null;
    }

    public function getTuesdayLabelAttribute($value)
    {
        return static::TUESDAY_SELECT[$this->tuesday] ?? null;
    }

    public function getWednesdayLabelAttribute($value)
    {
        return static::WEDNESDAY_SELECT[$this->wednesday] ?? null;
    }

    public function getThursdayLabelAttribute($value)
    {
        return static::THURSDAY_SELECT[$this->thursday] ?? null;
    }

    public function getFridayLabelAttribute($value)
    {
        return static::FRIDAY_SELECT[$this->friday] ?? null;
    }

    public function getBookingTypesAttribute()
    {
        return static::BOOKING_TYPES;
    }

    public function child()
    {
        return $this->belongsTo(Child::class, 'child_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
