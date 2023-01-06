<?php

namespace App\Imports;

use App\Models\PreparationBrief;
use Maatwebsite\Excel\Concerns\ToModel;

class BriefImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PreparationBrief([
            'Nom_du_brief'=> $row[1],
            'Description'=> $row[2],
            'Duree'=> $row[3],
        ]);
    }
}
