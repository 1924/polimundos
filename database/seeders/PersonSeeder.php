<?php

namespace Database\Seeders;

use App\Models\Persons;
use App\Models\ProfilePersons;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        for ($i=0; $i < 10; $i++) { 
            $faker = Faker::create();
            $firstName = $faker->firstName();
            $lastName = $faker->lastName();
            $fullname = $firstName.' '. $lastName;

            $person = new Persons();
            $person->full_name = $fullname;
            $person->email = $faker->unique()->safeEmail();
            $person->phone = $faker->phoneNumber();
            $person->save();   

            $profile = new ProfilePersons();
            $profile->person_id = $person->id;
            $profile->first_name = $firstName;
            $profile->last_name = $lastName;
            $profile->direccion = $faker->address();
            $profile->save();

        }
        

    }
}
