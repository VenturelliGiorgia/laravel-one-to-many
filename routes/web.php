<?php

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::prefix("admin.")
//     ->name("admin.")
//     ->group(function(){
//         Route::get("/", [ProjectController::class, "index"])->name("index");
//         Route::get("/create", [ProjectController::class, "create"])->name("create");
//         Route::post("/", [ProjectController::class, "store"])->name("store");
//         Route::get("/{project}", [ProjectController::class, "show"])->name("show");
//         Route::get("/{project}/edit", [ProjectController::class, "edit"])->name("edit");
//         Route::put("/{project}", [ProjectController::class, "update"])->name("update");
//         Route::delete("/{project}", [ProjectController::class, "destroy"])->name("destroy");
//     });

Route::get("/", [ProjectController::class, "index"])->name("projects.index");
Route::get("/projects/create", [ProjectController::class, "create"])->name("projects.create");
Route::post("/projects", [ProjectController::class, "store"])->name("projects.store");
Route::get("/projects/{project}", [ProjectController::class, "show"])->name("projects.show");
Route::get("/projects/{project}/edit", [ProjectController::class, "edit"])->name("projects.edit");
Route::put("/projects/{project}", [ProjectController::class, "update"])->name("projects.update");
Route::delete("/projects/{project}", [ProjectController::class, "destroy"])->name("projects.destroy");

require __DIR__ . '/auth.php';
