<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreparationTache extends Model
{
    use HasFactory;

    protected $table = "preparation_tache";
    public $timestamps= false;
    protected $fillable = [
    "Nom_tache",
    "Description",
    "Duree",
    "Preparation_brief_id"
    ];

    public function preparation_brief(){
        return $this->belongsTo(PreparationBrief::class);
    }
}
