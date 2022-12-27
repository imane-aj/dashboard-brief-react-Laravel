<?php

namespace App\Http\Controllers\controllers;

use App\Http\Controllers\Controller;
use App\Models\Formation_year;
use App\Models\Group;
use App\Models\StudentGroup;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function formation(){
        $years = Formation_year::all();
        $groups = Group::all();
        $group_student = StudentGroup::all();
        return [
            'groups' =>$groups,
            'years' =>  $years,
            'students' => $group_student
        ];
    }
}
