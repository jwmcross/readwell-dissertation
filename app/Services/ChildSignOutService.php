<?php


namespace App\Services;


use App\Models\Child;
use App\Models\ChildSignOut;
use App\Models\Register;

class ChildSignOutService
{

    public function createSignOutEntry($registerId, $childId)
    {

        $entry = ChildSignOut::query()
            ->where('child_id', $childId)
            ->where('register_id', $registerId)
            ->first();


        if(is_null($entry)) {
            return ChildSignOut::create([
                'child_id'      =>  $childId,
                'register_id'   =>  $registerId,
            ]);
        }
        return false;
    }

    public function initialStaffSignout($data, $register_id, $child_id)
    {
        $record = ChildSignOut::query()
            ->where('child_id', $child_id)
            ->where('register_id', $register_id)
            ->first();

        if(empty($data)){
            $data = [
                'sign_out_time' => now(),
            ];
        }


        $record->update($data);
    }

}
