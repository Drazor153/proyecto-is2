<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\RegisterController;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
    // return view('welcome');
    return Redirect::route('auth.login');
});

// Route::get('/home/{name}', function(string $name){
//     return view('home', ['name' => $name]);
// });

Route::get('/register', [RegisterController::class, 'show'])->name('auth.register');
Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');

Route::get('/login', [LoginController::class, 'show'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login'])->name('auth.login');

Route::get('/logout', [LogoutController::class, 'logout'])->name('auth.logout');


Route::post('/projects/next', function (Request $request) {
    $project = Project::find($request->project);
    $project->status = 'Finalizado';
    $project->save();

    return redirect()->route('projects.index')->with('success', 'Proyecto finalizado!');
})->name('projects.next');

Route::resource('/projects', ProjectsController::class);

// Route::get('/project', [PanelController::class, 'show'])->name('projects');

// Vista principal
// Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');

// // Ruta para crear proyecto
// Route::post('/projects', [ProjectsController::class, 'store'])->name('projects');

// Route::get('/projects/{id}', [ProjectsController::class, 'show'])->name('projects-edit');
// Route::patch('/projects/{id}', [ProjectsController::class, 'update'])->name('projects-update');
// Route::delete('/projects/{id}', [ProjectsController::class, 'destroy'])->name('projects-destroy');
