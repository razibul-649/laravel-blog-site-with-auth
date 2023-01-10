<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\LoginController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::get('/send-mail', [MailController::class, 'mailSenderForm'])->name('send-mail-get');
// Route::post('/send-mail', [MailController::class, 'sendSimpleMail'])->name('send-mail-post');

Route::get('/category/add', [CategoryController::class, 'index'])->name('category.add')->middleware('auth');
Route::post('/category/create', [CategoryController::class, 'create'])->name('category.create')->middleware('auth');
Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage')->middleware('auth');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit_ready'])->name('category.edit')->middleware('auth');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update')->middleware('auth');;
Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete')->middleware('auth');;

//login router is here

if(!Auth::check()){

    
Route::get('/login',[LoginController::class,'login'])->name('login')->middleware('guest');
Route::get('/register',[LoginController::class,'register'])->name('register')->middleware('guest');
Route::post('/register',[LoginController::class,'registerConf'])->name('registerConf')->middleware('guest');
Route::post('/loginInf',[LoginController::class,'loginInf'])->name('loginInf')->middleware('guest');

}else{
    
    return redirect('/home')->back();
    
}
Route::get('/logOut',[LoginController::class,'logOut'])->name('logOut')->middleware('auth');



Route::resource('/blog', BlogController::class)->middleware('auth');