<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
 //gallery

Route::get('rubriques',function(){
	return App::make('PublicationController')->CouvertureGallerie(2);
});


Route::post('rubriques',function(){
$id=$_POST['id'];
	return App::make('PublicationController')->chargement($id);
});


//authentification

Route::get('/', function()
{
	
	$view=View::make('layout.authentification');
	return $view;
});

Route::post('/', function()
{	
	return App::make('UserController')->signIn();		
});

//commentaires publications

Route::get('/commentaires/{id}', function($id)
{	
	return App::make('CommentController')->index($id);
});

Route::post('deletePhoto', function()
{	
	return App::make('PublicationController')->deletePhoto();
});
Route::get('telechargement/{id}', function($rubric_id)
{
	
	return App::make('PublicationController')->telechargement($rubric_id);		
});








Route::get('header', function()
{
	
	$view=View::make('layout.header');
	return $view;
});

/*
|--------------------------------------------------------------------------
| User Route
|--------------------------------------------------------------------------
|
*/
Route::get('edit', function()
{
	$view=View::make('edit');
	return $view;
});
Route::get('inscription', function()
{
	$view=View::make('layout.signup');
	return $view;
});
Route::post('inscription','UserController@signup');


Route::resource('user','UserController');
Route::get('search','UserController@getAll');
Route::post('search','UserController@search');

/*
|--------------------------------------------------------------------------
| Event Route
|--------------------------------------------------------------------------
|
*/
Route::get('evenement', function()
{
	
	$view=View::make('layout.newEvent');
	return $view;
});

Route::post('evenement','EventController@createEvent');
Route::get('evenements','EventController@getAll');



/*
|--------------------------------------------------------------------------
| Publication Route
|--------------------------------------------------------------------------
|
*/
Route::get('upload','PublicationController@uploadPhotos');
Route::post('upload','PublicationController@upload_button');

Route::post('addComment','CommentController@addComment');
Route::post('addJaime','JaimeController@addJaime');
Route::post('deleteJaime','JaimeController@deleteJaime');

/*
|--------------------------------------------------------------------------
| Rubric Route
|--------------------------------------------------------------------------
|
*/
Route::post('rubric/getRubrics','RubricController@getRubrics');