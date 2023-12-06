<?php

use App\Http\Controllers\CuorseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CuorseController::class,'show'])->name('cuorse.show');//Principal
Route::get('cuorse/create',[CuorseController::class,'create'])->name('cuorse.create');//Para crear
Route::post('cuorse/save',[CuorseController::class,'save'])->name('cuorse.save');
Route::get('cuorse/{id}/find',[CuorseController::class,'find'])->name('cuorse.find');
Route::get('cuorse/update',[CuorseController::class,'update'])->name('cuorse.update');//Para actualizar
Route::put('cuorse/{id}',[CuorseController::class,'updateCuorse'])->name('cuorse.updateCuorse');
Route::delete('cuorse/{id}',[CuorseController::class,'delete'])->name('cuorse.delete');//Para eliminar 
Route::get('cuorse/{id}/nota',[CuorseController::class,'listCuorse'])->name('cuorse.listCuorse');//Para el listado de las notas de los alumnos registrados en un curso