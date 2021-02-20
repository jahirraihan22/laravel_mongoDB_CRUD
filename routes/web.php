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


    
Route::get('/','CarController@index');
Route::middleware('auth')->group(function () {
    Route::get('add','CarController@create');
    Route::post('add','CarController@store');
    Route::get('edit/{id}','CarController@edit');
    Route::post('edit/{id}','CarController@update');
    Route::delete('{id}','CarController@destroy');

    Route::get('pet','PetController@index')->name('pet');
    Route::get('pet/create','PetController@create')->name('pet.create');
    Route::get('pet/edit/{id}','PetController@edit')->name('pet.edit');
    Route::post('pet/store','PetController@store')->name('pet.store');
    Route::post('pet/update/{id}','PetController@update')->name('pet.update');
    Route::delete('pet/delete/{id}','PetController@destroy')->name('pet.delete');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
