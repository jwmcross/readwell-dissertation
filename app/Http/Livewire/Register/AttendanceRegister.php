<?php

namespace App\Http\Livewire\Register;

use App\Models\Register;
use App\Services\ChildSignOutService;
use Carbon\Carbon;
use Livewire\Component;
class AttendanceRegister extends Component
{
    public $registerID;
    public $register;
    public $daysession;
    public $session;

    public $age_group = 2;

    protected $listeners = ['pageupdate' => '$refresh'];

    public function render()
    {
        $age_group = $this->age_group;

        $register = Register::where('register_date', Carbon::parse('next wednesday'))//todaysRegister()
        ->when($age_group>0, function ($query) use($age_group) {
            return $query->where('age_group', $age_group);
        })
            ->first();

        if(is_null($register)) {
            $children = [];
            return view('livewire.register.no-register-found');
        } else {
            $children = $register->children
                ->groupBy('attendance.child_id')
                ->map(function ($child){
                    return [
                        'child_id' => $child[0]->id,
                        'child_name' => $child[0]->fullname,
                        'morning_present' => $child[0]->attendance->in_time ?? null,
                        'afternoon_present' => $child[1]->attendance->in_time ?? null,
                        'morning_absent' => $child[0]->attendance->absence ?? null,
                        'afternoon_absent' => $child[1]->attendance->absence ?? null,
                        'morning' => $child[0]->attendance->session ??  null,
                        'afternoon' => $child[1]->attendance->session ?? null,
                        'birthday' => $child[0]->birthday
                    ];
                });
        }

        $this->register = $register;

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
                $created = (new ChildSignOutService)->createSignOutEntry($register->id, $childId);
            } catch(\Exception $exception) {
                log($exception->getMessage());
            }
        }

        $this->emit('$refresh');
    }

    public function markAbsent($childId, $session, $reason )
    {

        $register = $this->register;
        // Check if the child is on the Register
        // Check if there is no time set for the register
        $record = $register->children()
            ->wherePivot('session', $session)
            ->wherePivot('child_id', $childId)
            ->wherePivot('in_time', null)
            ->wherePivot('absence', null);


        $check = $record->exists();

        if ($check) {
            $record->updateExistingPivot($childId, ['absence'=> $reason]);
        }

        $this->emit('$refresh');
    }

    public function refresh()
    {
        $this->reset();
    }
}
?>

