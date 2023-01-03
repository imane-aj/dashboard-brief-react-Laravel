<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupesPreparationBrief extends Model
{
    use HasFactory;

    protected $table = "groupes_preparation_brief";
    public $timestamps= false;
    protected $fillable = [
    "Apprenant_preparation_brief_id",
    "Groupe_id"

    ];
}
