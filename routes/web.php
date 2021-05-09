<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PenaltiesController;
use App\Http\Controllers\DecisionsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('employeeRecords/{id}', [EmployeesController::class, 'employeeRecords'])
->middleware(['auth'])->name('employeeRecords');

Route::get('getPenaltiesByDecID/{id}', [PenaltiesController::class, 'getPenaltiesByDecID'])
->middleware(['auth'])->name('getPenaltiesByDecID');

Route::delete('deletePenaltyByDecID', [PenaltiesController::class, 'deletePenaltyByDecID'])
->middleware(['auth'])->name('deletePenaltyByDecID');

Route::get('getAllEmployees', [EmployeesController::class, 'getAllEmployees']);
Route::get('getAllPenalties', [PenaltiesController::class, 'getAllPenalties']);
Route::get('getAllRecords', [PenaltiesController::class, 'getAllRecords'])->name('getAllRecords');
Route::get('PenaltyRecords', [PenaltiesController::class, 'PenaltyRecords'])->name('PenaltyRecords');
Route::get('findEmployee', [EmployeesController::class, 'findEmployee']);

Route::patch('setExecutionDate/{emp_id}', [PenaltiesController::class, 'setExecutionDate']);

Route::resource('employees', EmployeesController::class)->middleware(['auth']);
Route::resource('penalties', PenaltiesController::class)->middleware(['auth']);
Route::resource('decisions', DecisionsController::class)->middleware(['auth']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
