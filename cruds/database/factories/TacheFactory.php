<?php

namespace Database\Factories;

use App\Models\Apprenant;
use App\Models\Brief;
use App\Models\PreparationTache;
use App\Models\Tache;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\apprenant_preparation_tache>
 */
class TacheFactory extends Factory
{
    protected $model=Tache::class;
    public function definition()
    {
        $preparationTache =PreparationTache::all()->pluck('id')->toArray();
        $ApprenantPreparationBrief =Brief::all()->pluck('id')->toArray();
        $apprenant =Apprenant::all()->pluck('id')->toArray();

        return [
            "Preparation_tache_id"=>$this->faker->randomElement($preparationTache),
            "Apprenant_id"=>$this->faker->randomElement($apprenant),
            "Apprenant_P_Brief_id"=>$this->faker->randomElement($ApprenantPreparationBrief),
            "Etat"=>$this->faker->randomElement(['en pause', 'terminer', 'en cours']) ,
            "date_debut"=>$this->faker->date(),
            "date_fin"=>$this->faker->date(),
        ];
    }
}
