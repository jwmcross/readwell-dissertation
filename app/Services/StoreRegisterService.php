<?php


namespace App\Services;


use App\Models\Register;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Continue_;

class StoreRegisterService
{
    public const SUNDAY = 0;
    public const MONDAY = 1;
    public const TUESDAY = 2;
    public const WEDNESDAY = 3;
    public const THURSDAY = 4;
    public const FRIDAY = 5;
    public const SATURDAY = 6;

    public function storeWeeklyRegister($startDate, $ageGroup, $childrenBookings)
    {

        $weekstart = Carbon::parse($startDate);
        $startDay = $weekstart->dayOfWeek;
        $days = [
            'monday'    => Carbon::MONDAY,
            'tuesday'   => Carbon::TUESDAY,
            'wednesday' => Carbon::WEDNESDAY,
            'thursday'  => Carbon::THURSDAY,
            'friday'    => Carbon::FRIDAY,
        ];

        $date = Carbon::createFromFormat('D d F, Y', $startDate);

        //Create a Register for each day of thr week after the starting day.
        $register = [];
        foreach($days as $day => $value){
            if($startDay <= $value ) {
                $register[$day] = Register::create([
                    'title'         => '' . $date->format('l d F') . ' ' . Register::AGE_GROUP_SELECT[$ageGroup],
                    'register_date' => $date,
                    'age_group'     => $ageGroup
                ]);
                $date->addDay();
                Continue;
            }
            unset($days[$day]);
        }

        // session = 1 => Morning, 2 => Afternoon, 3 => Full Day
        foreach($childrenBookings as $key => $sessions) {
            list(, $child_id) = explode('_', $key);

            foreach($sessions as $keyindex => $session) {
                try {
                    list($day,$sessionid) = explode('_', $session);
                } catch(\Exception $e) {
                    continue;
                }

                //No Booked Session. Skip.
                if(is_null($sessionid) || $sessionid == '4'){
                    continue;
                }
                //Check if the child is booked for that day.
                if(in_array($day, array_keys($days))) {
                    //Book the child on the day register
                    //Else book the child into their session slot
                    if($sessionid == 3) {
                        $register[$day]->children()->attach($child_id, ['session' => 1]);
                        $register[$day]->children()->attach($child_id, ['session' => 2]);
                        continue;
                    }
                    $register[$day]->children()->syncWithPivotValues($child_id, ['session' => $sessionid]);
                }
            }
        }
    }

}
