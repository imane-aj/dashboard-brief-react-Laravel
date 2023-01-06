<?php

namespace Database\Factories;

use App\Models\Formateur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\formateur>
 */
class FormateurFactory extends Factory
{
    protected $model=Formateur::class;
    public function definition()
    {
        return [

            "Nom_formateur"=>$this->faker->firstName(),
            "Prenom_formateur"=>$this->faker->lastName(),
            "Email_formateur"=>$this->faker->email(),
            "Phone"=>$this->faker->phoneNumber(),
            "Adress"=>$this->faker->address (),
            "CIN"=>$this->faker->secondaryAddress(),
            "Image"=>$this->faker->imageUrl(true, 'Faker',true),




        ];
    }
}
