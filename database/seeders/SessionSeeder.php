<?php

namespace Database\Seeders;

use App\Models\Session;
use Illuminate\Database\Seeder;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
            ['title'     =>  'Preschool Morning'],
            ['title'     =>  'Preschool Afternoon'],
        ];

        Session::insert($data);


    }
}
