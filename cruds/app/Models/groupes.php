<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groupes extends Model
{
    use HasFactory;

    protected $table = "groupes";
    public $timestamps= false;
    protected $fillable = [

        "Nom_groupe",
        "Annee_formation_id",
        "Formateur_id",
        "Logo"

    ];
}
