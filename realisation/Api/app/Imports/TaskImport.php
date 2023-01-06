<?php

namespace App\Imports;

use App\Models\PreparationTache;
use Maatwebsite\Excel\Concerns\ToModel;

class TaskImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PreparationTache([
            'Nom_tache'=> $row[1],
            'Description'=> $row[2],
            'Duree'=> $row[3],
        ]);
    }
}
