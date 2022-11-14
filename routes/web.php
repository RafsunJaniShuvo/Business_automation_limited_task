<?php
use App\Http\Middleware\CustomAuth;

use App\Http\Controllers\Auth\CustomAuthController;
use App\Http\Controllers\fileController;
use App\Http\Controllers\homeController;
use App\Http\Middleware\Auth;
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

// Route::get('/home',[homeController::class,'create'])->name('home');
 
Route::middleware([CustomAuth::class])->group(function () {
   
    Route::get('/dashboard',[CustomAuthController::class,'dashboard'])->name('dashboard');
    Route::get('/log-out',[CustomAuthController::class,'logout'])->name('logout');  
    
    
    //Home
Route::get('/home',[homeController::class,'manage'])->name('home.manage');
Route::get('/get-data',[homeController::class,'getData'])->name('ajax.getData');
Route::post('/store-data',[homeController::class,'store_info'])->name('store_info');
Route::get('/edit-data/{id}',[homeController::class,'edit_info'])->name('edit_info');
Route::post('/update-data/{id}',[homeController::class,'update_info'])->name('update_info');
Route::get('/delete-data/{id}',[homeController::class,'delete_info'])->name('delete_info');

//file

Route::get('/file',[fileController::class,'create'])->name('create.file');
// Route::post('/image-upload',[fileController::class,'store_image'])->name('store_image');
Route::post('/store-multi-file-ajax', [fileController::class, 'storeMultiFile']);



    
});
// authentication
Route::get('/login',[CustomAuthController::class,'index'])->name('login');
Route::post('/custom-login',[CustomAuthController::class,'customLogin'])->name('customLogin');
Route::get('/regsitration',[CustomAuthController::class,'registration'])->name('register');
Route::post('/custom-registration',[CustomAuthController::class,'customRegistration'])->name('custom-registration');

     

