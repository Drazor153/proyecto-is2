<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ProjectsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home/{name}', function(string $name){
    return view('home', ['name' => $name]);
});

Route::get('/project', [PanelController::class, 'show'])->name('projects');

Route::get('/project/create', [PanelController::class, 'create']);
Route::post('/project', [ProjectsController::class, 'store'])->name('new-project');
