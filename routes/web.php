<?php

use App\Http\Controllers\CustPartController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\LoginConttroller;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PortoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;
use PHPUnit\TextUI\XmlConfiguration\Logging\TeamCity;
use Symfony\Component\Mailer\Transport\Smtp\Auth\LoginAuthenticator;

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

Route::get('/', [TeamController::class,'show'])->middleware('auth');
Route::get('/login',[LoginConttroller::class,'index'])->name('login')->middleware('guest');
Route::post('/login',[LoginConttroller::class,'auth'])->middleware('guest');
Route::post('/logout',[LoginConttroller::class,'logout']);
Route::post('/add-team',[TeamController::class,'store']);
Route::post('/add-pc',[CustPartController::class,'add']);
Route::get('/teams',[TeamController::class,'show']);
Route::get('/customer-partner',[CustPartController::class,'show']);
Route::post('/add-porto',[PortoController::class,'add'])->middleware('auth');
Route::get('/porto',[PortoController::class,'show'])->middleware('auth');
Route::get('/client/{custpart}',[CustPartController::class,'detail'])->middleware('auth');
Route::delete('/delete/{custpart}',[CustPartController::class,'destroy']);
Route::delete('/del/{portofolio}',[PortoController::class,'destroy']);
Route::post('/update-team/{team}',[TeamController::class,'update']);
Route::delete('/del-team/{team}',[TeamController::class,'destroy']);
Route::get('/update-porto/{portofolio}',[PortoController::class,'uindex'])->middleware('auth');
Route::get('/land',[PageController::class,'index'])->middleware('auth');
Route::post('/update-porto/{portofolio}',[PortoController::class,'update']);
Route::post('/update-custpart/{custpart}',[CustPartController::class,'update']);
Route::post('/publish-team/{team}',[TeamController::class,'publish']);
Route::post('/unpublish-team/{team}',[TeamController::class,'unpublish'])->middleware('auth');
Route::get('/links',[LinkController::class,'index'])->middleware('auth');
Route::post('/edit-link/{link}',[LinkController::class,'update']);
Route::get('services',[ServiceController::class,'index'])->middleware('auth');
Route::post('add-service',[ServiceController::class,'store']);
Route::post('/update-service/{service}',[ServiceController::class,'update']);
Route::delete('/del-service/{service}',[ServiceController::class,'destroy']);
Route::get('/porto-landpage',[PageController::class,'porto']);
Route::get('/portofolio/{portofolio}',[PageController::class,'portofolio']);
