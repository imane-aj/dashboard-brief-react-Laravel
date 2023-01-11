<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apprenant extends Model
{
    use HasFactory;
    protected $table = "apprenant";
    public $timestamps= false;
    protected $fillable = [

        "Nom",
        "Prenom",
        "Email",
        "Phone",
        "Adress",
        "CIN",
        "Date_naissance",
        "Image"
    ]; 
    public function groups(){
        return $this->belongsToMany(Groupes::class, 'groupes_apprenant');
    }
    public function student_preparation_brief(){
        return $this->belongsToMany(PreparationBrief::class, 'brief', 'Preparation_brief_id');
    }
    public function task(){
        return $this->hasMany(Tache::class);
    }
}
