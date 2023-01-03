<?php

namespace Database\Factories;

use App\Models\AnneFormation;
use App\Models\Formateur;
use App\Models\Groupes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\groupes>
 */
class GroupesFactory extends Factory
{
    protected $model=Groupes::class;
    public function definition()
    {
        $formateur =Formateur::all()->pluck('id')->toArray();


        $annee_formation =AnneFormation::all()->pluck('id')->toArray();


        return [
            "Nom_groupe"=>$this->faker->name(),
            "Annee_formation_id"=>$this->faker->randomElement($annee_formation),
            'Formateur_id'=> $this->faker->randomElement($formateur),

            "Logo"=>$this->faker->imageUrl(true, 'Faker',true),
        ];
    }
}
