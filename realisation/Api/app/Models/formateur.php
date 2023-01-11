<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = "formateur";
    public $timestamps= false;
    protected $fillable = [
        "Nom_formateur",
        "Prenom_formateur",
        "Email_formateur",
        "Phone",
        "Adress",
        "CIN",
        "Image"
    ];
    public function groups(){
        return $this->hasMany(Groupes::class);
    }

    public function teacher_preparation_brief(){
        return $this->hasMany(PreparationBrief::class);
    }
}

