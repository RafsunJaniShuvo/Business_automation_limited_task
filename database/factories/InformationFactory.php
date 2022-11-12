<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\=Information>
 */
class InformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_name'=>$this->faker->user_name,
            'email'=>$this->faker->email,
            'gender'=>$this->gender,
            'qualification'=>$this->qualification,
            'birthday'=>$this->birthday,
            'description'=>$this->description,
            'status'=>$this->status,       
         ];
    }
}
