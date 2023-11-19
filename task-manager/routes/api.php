<?php

use App\Http\Controllers\Api\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/tasks',[TaskController::class, 'index']);
Route::post('/tasks',[TaskController::class, 'save']);
Route::post('/task/{task}',[TaskController::class, 'show']);
Route::put('/task/{task}',[TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('api.tasks.destroy');
