<?php

use App\Http\Controllers\AddRowController;
use App\Http\Middleware\CustomAuth;

use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\fileController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\stepperController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Route::get('/home',[homeController::class,'create'])->name('home');

Route::middleware([CustomAuth::class])->group(function () {


    Route::get('/log-out',[CustomAuthController::class,'logout'])->name('logout');


        //Home
    Route::get('/home',[HomeController::class,'manage'])->name('home.manage');
    Route::get('/get-data',[HomeController::class,'getData'])->name('ajax.getData');
    Route::post('/store-data',[HomeController::class,'store_info'])->name('store_info');
    Route::get('/edit-data/{id}',[HomeController::class,'edit_info'])->name('edit_info');
    Route::post('/update-data/{id}',[HomeController::class,'update_info'])->name('update_info');
    Route::get('/delete-data/{id}',[HomeController::class,'delete_info'])->name('delete_info');

    //file
    Route::get('/image',[fileController::class,'create'])->name('add_images');
    Route::post('/image-upload', [fileController::class, 'storeMultiFile']);


    //stepper
    Route::get('/step_1',[stepperController::class,'create'])->name('stepper');
    Route::get('/step_2',[stepperController::class,'create_2'])->name('stepper_2');

    //add row
    Route::get('/addrow',[AddRowController::class,'create']);
    Route::post('dynamic/addrow',[AddRowController::class,'addrow']);

    //redis
    Route::get('/redis',[HomeController::class,'getDataIntoRedis']);

});

// Dashboard
Route::get('/',[CustomAuthController::class,'dashboard'])->name('dashboard');
// authentication
Route::get('/login',[CustomAuthController::class,'index'])->name('login');
Route::post('/custom-login',[CustomAuthController::class,'customLogin'])->name('customLogin');
Route::get('/regsitration',[CustomAuthController::class,'registration'])->name('register');
Route::post('/custom-registration',[CustomAuthController::class,'customRegistration'])->name('custom-registration');





