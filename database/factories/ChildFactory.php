<?php

namespace Database\Factories;

use App\Models\Child;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChildFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Child::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//        $firstdate = $this->faker->dateTimeBetween('-5 years', '-3 years');
//        $seconddate = Carbon::now()->subYear();Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addHour();
//
//        Carbon::createFromFormat('Y-m-d H:i:s', $startDate)->addHour();

        return [
            'firstname'     => $this->faker->firstName,
            'lastname'      => $this->faker->lastName,
            'date_of_birth' => $this->faker->dateTimeBetween('-5 years', '-2 years'),
//            'dob'           => $this->faker->dateTimeBetween($firstdate, $seconddate),
             //'dob'           => $this->faker->date
        ];
    }
}
