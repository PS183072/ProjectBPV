<?php

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

// Main Controller
Route::get('/', 'Controller@LoadHomepage');
Route::get('/home', 'Controller@LoadHomepage');
Route::get('/logout', 'UserController@getLogout');
Route::get('/bedrijf', 'Controller@LoadBedrijfLogin');
Route::get('/stagelijst', 'VoorkeurController@LoadStagelijst');
Route::get('/formulier', 'Controller@LoadFormulier');
// Voorkeurcontroller
Route::post('/formulier', 'VoorkeurController@InsertFormulier');
Route::get('/voorkeur', 'VoorkeurController@LoadVoorkeur');
// Stagelijstcontroller
Route::post('/aanvraag', 'StagelijstController@InsertAanvraag');

