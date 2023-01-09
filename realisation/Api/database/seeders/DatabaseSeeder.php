<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use App\Models\AnneFormation;
use App\Models\Apprenant;
use App\Models\Brief;
use App\Models\Formateur;
use App\Models\Groupes;
use App\Models\GroupesApprenant;
use App\Models\GroupesPreparationBrief;
use App\Models\PreparationBrief;
use App\Models\PreparationTache;
use App\Models\Tache;
use Database\Factories\AnneFormationFactory;
use Database\Factories\ApprenantFactory;
use Database\Factories\BriefFactory;
use Database\Factories\TacheFactory;
use Database\Factories\FormateurFactory;
use Database\Factories\GroupesFactory;
use Database\Factories\GroupesApprenantFactory;
use Database\Factories\GroupesPreparationBriefFactory;
use Database\Factories\PreparationBriefFactory;
use Database\Factories\PreparationTacheFactory;

                         


class DatabaseSeeder extends Seeder
{
  public function run (){
      $annee = new AnneFormation([
        'Annee_scolaire' => fake()->date('Y')
      ]);
      foreach ([$annee] as $i => $year) {
        
  
        // Create new pre formateur.
        foreach(['Fouad', 'Abdelatif'] as $f){
          $formateur = new Formateur([
            'Nom_formateur' => $f,
          ]);
        }
        $formateur->save();
  
        // Create new group.
        foreach(['1', '2'] as $f){
          $group = new Groupes([
            'Nom_groupe' => "Group " . $i + 1,
            'Annee_formation_id' => $year->id,
            'Formateur_id' => $f
          ]);
        }
        $group->save();
  
        // Create new preparation project.
        $preparationProject = new PreparationBrief([
            'Nom_du_brief' => fake()->company,
            'Formateur_id' => $formateur->id,
            'Duree' => 86400 // 1 Day
        ]);
        $preparationProject->save();
  
        // Create new preparation tasks.
        for ($i = 0; $i <= 5; $i++) {
            $preparationTask = new PreparationTache([
                'Nom_tache' => "Task $i",
                'Preparation_brief_id' => $preparationProject->id,
            ]);
            $preparationTask->save();
            $preparationTask[] = $preparationTask->id;
        }
  
        // Create new students.
        for ($i = 0; $i <= 5; $i++) {
            $student = new Apprenant([
                'Nom' => fake()->firstName,
                'Prenom' => fake()->lastName,
                'cin' => Str::random(8),
            ]);
            $student->save();
  
            // Create new relation project.
            $project = new Brief([
                'Preparation_brief_id' => $preparationProject->id,
                'Apprenant_id' => $group->id,
            ]);
            $project->save();
  
            // Create new task.
            $task = new Tache([
                'preparation_brief_id' => $preparationProject->id,
                'preparation_tache_id' => $preparationTask[$i],
                'apprenant_P_brief_id' => $project->id,
                'Apprenant_id' => $student->id,
                'status' => 2,
            ]);
            $task->save();
  
    }
  }
    }

}
