<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cities = City::all();
        $users = new User();

        return [
            //
            'email' => $this->faker->email(),
            'password' => $this->faker->password(),
            
            'first_name' => $users->first_name,
            // $users->first_name => ->faker->name(),
            'last_name' => $users->last_name,
            'mobile' => $users->mobile,
            'address' => $users->address,
            'date_of_birth' => $users->date_of_birth,
            'gender' => $users->gender,
            'status' => $users->status,
            'city_id' => $cities->random(),

                // 'first_name' => $this->faker->firstName(),
            // 'last_name' => $this->faker->lastName(),
            // 'mobile' => $this->faker->phoneNumber(),
            // 'address' => $this->faker->address(),
            // 'date_of_birth' => $this->faker->date(),
            // // 'gender' => $this->faker,
            // // 'status' => $this->faker,
            // 'city_id' => $cities->random(),
            // 'email' => $this->faker->email(),
            // 'password' => $this->faker->password(),
        ];
    }
}
