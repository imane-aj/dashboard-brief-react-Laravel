<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
    use HasFactory;
    protected $table = "tache";
    public $timestamps= false;
    protected $fillable = [
    "Preparation_tache_id",
    "Apprenant_id",
    "Apprenant_P_Brief_id",
    "Etat",
    "date_debut",
    "date_fin"
    ];
}
