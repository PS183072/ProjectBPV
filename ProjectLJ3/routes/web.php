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
Route::get('/formulier', 'Controller@LoadFormulier');
Route::get('/mailbedrijven', 'Controller@LoadBedrijvenMailen');
Route::post('/mailbedrijven', 'Controller@VerzendMails');

// Voorkeurcontroller
Route::post('/formulier', 'VoorkeurController@InsertFormulier');
Route::get('/voorkeur', 'VoorkeurController@LoadVoorkeur');

// Stagelijstcontroller
Route::post('/aanvraag', 'StagelijstController@InsertAanvraag');
Route::get('/stagelijst', 'StagelijstController@LoadStagelijst');

// MailController
Route::get('/mailen', 'MailController@mail');

//EnqueteController
Route::get('/enquete', 'EnqueteController@CheckUuid');
Route::post('/enquete', 'EnqueteController@VerstuurEnquete');