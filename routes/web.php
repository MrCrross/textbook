<?php

use App\Http\Controllers\TextbookController;
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

Route::get('/', [TextbookController::class, 'index'])->name('index');
Route::get('/headers/{id}', [TextbookController::class, 'show'])->name('show.header');
Route::get('/themes/{id}', [TextbookController::class, 'themeShow'])->name('show.theme');
Route::get('/labs/{id}', [TextbookController::class, 'labShow'])->name('show.lab');

Route::get('/create', function () {return view('create');})->name('create.header');
Route::get('/theme/create', [TextbookController::class, 'theme'])->name('create.theme');
Route::get('/lab/create', [TextbookController::class, 'lab'])->name('create.lab');
Route::get('/lab/mission/create', [TextbookController::class, 'mission'])->name('create.mission');
Route::get('/lab/mission/step/create', [TextbookController::class, 'step'])->name('create.step');

Route::post('/create', [TextbookController::class, 'headerCreate']);
Route::post('/theme/create', [TextbookController::class, 'themeCreate']);
Route::post('/lab/create', [TextbookController::class, 'labCreate']);
Route::post('/lab/mission/create', [TextbookController::class, 'missionCreate']);
Route::post('/lab/mission/step/create', [TextbookController::class, 'stepCreate']);

Route::get('/edit', [TextbookController::class, 'edit'])->name('edit.header');
Route::get('/theme/edit', [TextbookController::class, 'themeEdit'])->name('edit.theme');
Route::get('/lab/edit', [TextbookController::class, 'labEdit'])->name('edit.lab');
Route::get('/lab/mission/edit', [TextbookController::class, 'missionEdit'])->name('edit.mission');
Route::get('/lab/mission/step/edit', [TextbookController::class, 'stepEdit'])->name('edit.step');

Route::put('/edit', [TextbookController::class, 'headerUpdate']);
Route::put('/theme/edit', [TextbookController::class, 'themeUpdate']);
Route::put('/lab/edit', [TextbookController::class, 'labUpdate']);
Route::put('/lab/mission/edit', [TextbookController::class, 'missionUpdate']);
Route::put('/lab/mission/step/edit', [TextbookController::class, 'stepUpdate']);

Route::delete('/edit', [TextbookController::class, 'headerDelete']);
Route::delete('/theme/edit', [TextbookController::class, 'themeDelete']);
Route::delete('/lab/edit', [TextbookController::class, 'labDelete']);
Route::delete('/lab/mission/edit', [TextbookController::class, 'missionDelete']);
Route::delete('/lab/mission/step/edit', [TextbookController::class, 'stepDelete']);
