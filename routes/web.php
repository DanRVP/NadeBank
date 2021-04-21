<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', 'NadeBankController@index')->name('nadebank.index');
Route::get('/add', 'NadeBankController@add')->middleware(['auth'])->name('nadebank.add');
Route::get('/edit', 'NadeBankController@edit')->middleware(['auth'])->name('nadebank.edit');
Route::get('/dropdown/{location_id}', 'NadeBankController@dropdownPop')->middleware(['auth'])->name('nadebank.dropdownPop');
Route::get('/textarea/{video_id}', 'NadeBankController@textAreaPop')->middleware(['auth'])->name('nadebank.textAreaPop');
Route::put('/update/{id}', 'NadeBankController@update')->middleware(['auth'])->name('nadebank.update');
Route::delete('/update/{id}', 'NadeBankController@delete')->middleware(['auth'])->name('nadebank.delete');
Route::get('/{slug}', 'NadeBankController@nades')->name('nadebank.nades');
Route::get('/{slug}/{slug2}', 'NadeBankController@location')->name('nadebank.location');
Route::get('/{slug}/{slug2}/{slug3}', 'NadeBankController@video')->name('nadebank.video');
Route::post('/', 'NadeBankController@store')->name('nadebank.store');
