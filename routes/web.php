<?php

use Illuminate\Support\Facades\Auth;
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
//Route pour log
Auth::routes();


//Route page d'acceuil
Route::get('/', 'HomeController@index')->name('home');

//ANNONCES

//Route SHOW détail annonce
Route::get('annonce/show/{id}', 'AnnonceController@show')->name('show');

//Route CREATE form création annonce
Route::get('annonce/create', 'AnnonceController@create');

//Route POST form creation annonce
Route::post('annonce/create', 'AnnonceController@storeAnnonce');

//route DELETE annonce
Route::delete('annonce/delete/{id}', 'AnnonceController@destroy')->name('delete');

//Création de  multi routes posts du PostsController
Route::resource('posts', 'AnnonceController') ;

//Route EDIT form annnonce
Route::get('annonce/edit/{id}', 'AnnonceController@edit')->name('edit');

//Route POST pour valider l'update de l'annonce
Route::post('annonce/edit/{id}', 'AnnonceController@update')->name('update');

Route::get('users/admin', 'AdminController@admin')->middleware('admin');

Route::get('update/', 'AdminController@updateUser')->name('updateUser');

Route::patch('update/{id}/update',  'AdminController@updateU')->name(('UpdateU'));




//Test
Route::get('/bonjour/{prenom}', 'MainController@bonjour');
