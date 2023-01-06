<?php

namespace Database\Factories;

use App\Models\AnneFormation;
use Illuminate\Database\Eloquent\Factories\Factory;


class AnneFormationFactory extends Factory
{
   
    public function definition()
    {
        return [
            "Annee_scolaire"=>$this->faker->year()."-".$this->faker->year()
        ];
    }
}
