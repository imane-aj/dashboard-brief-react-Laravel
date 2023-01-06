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

    public function teacher(){
        return $this->belongsTo(Formateur::class);
    }

    public function students(){
        return $this->belongsToMany(Apprenant::class, 'brief', 'Apprenant_id');
    }
    
    public function groups(){
        return $this->belongsToMany(Groupes::class, 'groupes_preparation_brief', '');
    }
    

    public function preparation_tasks(){
        return $this->hasMany(PreparationTache::class);
    }
}

