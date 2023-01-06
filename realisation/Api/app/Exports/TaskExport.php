<?php

namespace App\Exports;

use App\Models\PreparationTache;
use Maatwebsite\Excel\Concerns\FromCollection;

class TaskExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PreparationTache::all();
    }
}
