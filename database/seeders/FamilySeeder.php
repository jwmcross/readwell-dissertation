<?php

namespace Database\Seeders;

use App\Models\Family;
use Illuminate\Database\Seeder;

class FamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $family_data = [
            'family_name' => 'Stagg'
        ];


        $family1 = Family::factory()
            ->count(10)
            ->create();

        $children = Child::inRandomOrder();

        foreach($families as $family) {

        }


    }
}
