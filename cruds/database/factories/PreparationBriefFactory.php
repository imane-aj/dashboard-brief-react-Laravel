<?php

namespace Database\Factories;

use App\Models\Formateur;
use App\Models\PreparationBrief;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\preparation_brief>
 */
class PreparationBriefFactory extends Factory
{
    protected $model=PreparationBrief::class;
    public function definition()
    {
        $formateur = Formateur::all()->pluck('id')->toArray();
        return [
            "Nom_du_brief"=>$this->faker->name(),
            "Description"=>$this->faker->word() ,
            "Duree"=>$this->faker->randomNumber(1),
            "Formateur_id"=>$this->faker->randomElement($formateur),
        ];
    }
}
