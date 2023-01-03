<?php

namespace Database\Factories;

use App\Models\Apprenant;
use Illuminate\Database\Eloquent\Factories\Factory;
 

class ApprenantFactory extends Factory
{
   
        protected $model=Apprenant::class;
        public function definition()
        {
            return [
                "Nom"=>$this->faker->firstName(),
                "Prenom"=>$this->faker->lastName(),
                "Email"=>$this->faker->email(),
                "Phone"=>$this->faker->phoneNumber(),
                "Adress"=>$this->faker->address (),
                "CIN"=>$this->faker->secondaryAddress(),
                "Image"=>$this->faker->imageUrl(true, 'Faker',true),
                "Date_naissance"=>$this->faker->date(),
    
            ];
        }
    }

