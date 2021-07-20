<?php

namespace Database\Seeders;

use App\Models\Register;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'title'     =>  'This Register',
            'end_time'  =>  '15:00:00',
            'register_date' => Carbon::now(),
            'session_id'    => 1
        ];
        Register::insert($data);
    }
}
