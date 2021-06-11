<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Auth;

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
//Route::get('laguage/{lang}', LanguageController::class );
if ( file_exists( app_path( 'Http/Controllers/LocalizationController.php') ) ){
    Route::get('language/{locale}', [LocalizationController::class, 'setLanguage'])->name('language.index');
}

//Route::get('/', IndexController::class);
Route::get('/', function () {
    return view('main');
});
