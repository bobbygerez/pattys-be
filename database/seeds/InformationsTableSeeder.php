<?php

use Illuminate\Database\Seeder;
use App\Model\Information;

class InformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=1; $i < 100 ; $i++) { 
            Information::create([

                'employee_id' => $faker->ein,
                'user_id' => $i,
                'gender_id' => rand(1, 2),
                'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
                'mobile' => $faker->phoneNumber,
                'nationality' => 'Filipino',
                'civil_status_id' => rand(1, 4)
            ]);
        }
        
    }
}
