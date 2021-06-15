<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartementsController;
use App\Http\Controllers\ServiceController ;
use App\Http\Controllers\MedcinsController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\SecurityController;

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
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});
Route::get('/team',[MedcinsController::class, 'show']);

Route::get('/services',[ServiceController::class, 'services']);

Route::get('/services/{id}',[ServiceController::class, 'show']);
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/departments',[DepartementsController::class, 'show']);

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/consultation', [ConsultationController::class, 'show']);

Route::post('/consultation/reserver', [ConsultationController::class, 'reserver']);

Route::post('/consultation/confirmer', [ConsultationController::class, 'confirmer']);

Route::get('/consultation/test', [ConsultationController::class, 'test']);

Route::get('/patient/signUp', [SecurityController::class, 'signUp']);

Route::get('/patient/signIn', [SecurityController::class, 'signIn']);

Route::post('/patient/register', [SecurityController::class, 'register']);

Route::get('/patient/logOut', [SecurityController::class, 'logout']);

Route::post('patient/seConnecter', [SecurityController::class, 'seConnecter']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
