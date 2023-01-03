<?php

use App\Http\Controllers\ApprenantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('apprenant', ApprenantController::class);
route::get('/filter_group',[ApprenantController::class,'filter_group'])->name('filter_group');
route::get('/searchapprenant',[ApprenantController::class,'search_apprenant'])->name('searchapprenant');

Route::get('exportexcelapprenant',[ApprenantController::class,'exportexcel'])->name('exportexcelapprenant');
Route::post('importexcelapprenant',[ApprenantController::class,'importexcel'])->name('importexcelapprenant');
route::get('/generatepdfapprenant',[ApprenantController::class,'generatepdf'])->name('generatepdfapprenant');