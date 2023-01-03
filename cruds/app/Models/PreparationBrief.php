<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreparationBrief extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = "preparation_brief";
    public $timestamps= false;
    protected $fillable = [
    "Nom_du_brief",
    "Description",
    "Duree",
    "Formateur_id"
    ];
}

