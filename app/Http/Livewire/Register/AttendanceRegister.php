<?php

namespace App\Http\Livewire\Register;

use App\Models\Register;
use App\Services\ChildSignOutService;
use Livewire\Component;
class AttendanceRegister extends Component
{
    public $registerID;
    public $register;
    public $daysession;
    public $session;

    public $age_group = 2;

    public function render()
    {
        $age_group = $this->age_group;

        $register = Register::find(1) //todaysRegister()
            ->when($age_group>0, function ($query) use($age_group) {
                return $query->where('age_group', $age_group);
            })
            ->first();
        if(is_null($register)) {
            $children = [];
            return view('livewire.register.no-register-found');
        } else {
            $children = $register->children->groupBy('attendance.child_id');
        }

        $this->register = $register;

        //return view('livewire.register.test', compact(['register', 'morning','afternoon']));
        return view('livewire.register.attendance-register', compact(['register','children']));
    }

    public function setAgeGroup($group)
    {
        $this->age_group = $group;
    }

    public function markPresent($childId, $sessionId)
    {

        $session = 0;
        if($sessionId == 'Morning') {
            $session = 1;
        }
        else if($sessionId == 'Afternoon') {
            $session = 2;
        } else {
            return;
        }

        $register = $this->register;
        // Check if the child is on the Register
        // Check if there is no time set for the register
        $record = $register->children()
            ->wherePivot('child_id', $childId)
            ->wherePivot('session', $session)
            ->wherePivot('in_time', null);

        $check = $record->exists();

        if ($check) {
            $record->updateExistingPivot($childId, ['in_time'=> now()]);

            try {
                (new ChildSignOutService)->createSignOutEntry($register, $childId);
            } catch(\Exception $exception) {
                log($exception->getMessage());
            }
        }

        $this->emit('$refresh');
    }

    public function refresh()
    {
        $this->reset();
    }
}
