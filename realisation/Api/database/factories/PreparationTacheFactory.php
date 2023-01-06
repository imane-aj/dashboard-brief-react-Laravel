<?php

namespace Database\Factories;

use App\Models\preparation_brief;
use App\Models\preparation_tache;
use App\Models\PreparationBrief;
use App\Models\PreparationTache;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\preparation_tache>
 */
class PreparationTacheFactory extends Factory
{
    protected $model=PreparationTache::class;
    public function definition()
    {
        $preparationBrief =PreparationBrief::all()->pluck('id')->toArray();
        return [
            "Nom_tache"=>$this->faker->name(),
            "Description"=>$this->faker->word(),
            "Duree"=>$this->faker->randomNumber(1),
            "Preparation_brief_id"=>$this->faker->randomElement($preparationBrief),
        ];
    }
}
