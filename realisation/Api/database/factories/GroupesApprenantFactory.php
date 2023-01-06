<?php

namespace Database\Factories;

use App\Models\Apprenant;
use App\Models\Groupes;
use App\Models\GroupesApprenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\groupes_apprenant>
 */
class GroupesApprenantFactory extends Factory
{
    protected $model=GroupesApprenant::class;
    public function definition()
    {
        $apprenant =Apprenant::all()->pluck('id')->toArray();


        $groupe =Groupes::all()->pluck('id')->toArray();

        return [
            "Groupe_id"=>$this->faker->randomElement($groupe),
           "Apprenant_id"=>$this->faker->randomElement($apprenant),
        ];
    }
}
