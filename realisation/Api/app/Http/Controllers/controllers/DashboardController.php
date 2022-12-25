<?php

namespace App\Http\Controllers\controllers;

use App\Http\Controllers\Controller;
use App\Models\Formation_year;
use App\Models\Group;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function formation(){
        $years = Formation_year::all();
        $groups = Group::all();
        return [
            'groups' =>$groups,
            'years' =>  $years
        ];
    }
}
