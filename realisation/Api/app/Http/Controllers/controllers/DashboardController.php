<?php

namespace App\Http\Controllers\controllers;

use App\Http\Controllers\Controller;
use App\Models\Formation_year;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function formation(){
        $formation_years = Formation_year::all();
        return $formation_years;
    }
}
