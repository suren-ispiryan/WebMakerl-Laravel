<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ProgrammerController;
use App\Http\Controllers\CodeEditorController;

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

// =========== public routes ============
Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/SignUp', [SignController::class, 'register']);
Route::post('/SignIn', [SignController::class, 'login']);


// ======== private routes =============
Route::group(['middleware'=>'auth'], function(){
        // Manager
    Route::get('/managerCreate', [ManagerController::class, 'showCreate']);
    Route::post('/createTask', [ManagerController::class, 'createTask']);
    Route::get('/adminUpdate/{id}', [ManagerController::class, 'showUpdate']);
    Route::post('/adminUpdateTask/{id}', [ManagerController::class, 'updateTask']);
    Route::get('/managerDashboard', [ManagerController::class, 'showDash']);
    Route::get('/adminDelete/{id}', [ManagerController::class, 'deletePost']);
        // Programmer
    Route::get('/programmerDashboard', [ProgrammerController::class, 'showDash']);
    Route::get('/taskDetails/{id}', [ProgrammerController::class, 'showTaskDetails']);
    Route::get('/showTaskDetails/{id}', [ProgrammerController::class, 'viewTaskDetails']);
    Route::get('/codeEditor', [ProgrammerController::class, 'openCodeEditor']);
    Route::get('/userUpdateTask/{id}', [ProgrammerController::class, 'showUpdate']);
    Route::get('/updateForm/{id}', [ProgrammerController::class, 'showUpdateForm']);
    Route::post('/userUpdateFormController/{id}', [ProgrammerController::class, 'submitAnswer']);
    Route::post('/programmerSearchedDashboard', [ProgrammerController::class, 'searchTask']);
        // both
    Route::get('/logout', [SignController::class, 'logOut']);
    // editor
    Route::post('/codeEdit', [CodeEditorController::class, 'editCode']);
});

