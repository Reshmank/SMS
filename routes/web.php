<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth','web'])->group(function () {

   Route::any('/addSupplier',[HomeController::class, 'addSupplier']);
   Route::get('/supplier_list',[HomeController::class, 'supplier_list']);
   Route::post('/deleteSupplier',[HomeController::class, 'deleteSupplier']);
   Route::any('/editSupplier',[HomeController::class, 'editSupplier']);
 
   
   
   
   
   


});
