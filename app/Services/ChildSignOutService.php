<?php


namespace App\Services;


use App\Models\Child;
use App\Models\ChildSignOut;
use App\Models\Register;

class ChildSignOutService
{

    public function createSignOutEntry(Register $register, Child $child)
    {
        $register_id    = $register->id;
        $child_id       = $child->id;

        $entry = ChildSignOut::query()
            ->where('child_id', $child_id)
            ->where('register_id', $register_id)
            ->first();

        if($entry->exists()) {
            return;
        }
        else {

            ChildSignOut::create([
                'child_id'      =>  $child_id,
                'register_id'   =>  $register_id,
            ]);
        }
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
