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

//inscription
Route::get('inscription', function()
{
		$view=View::make('layout.signup');
		return $view;
});
Route::post('inscription','UserController@signup');





Route::group(array('before' => 'auth'), function()
{



	/*
	|--------------------------------------------------------------------------
	| User Route
	|--------------------------------------------------------------------------
	|
	*/	

	Route::get('modifier','UserController@editProfile');
	Route::post('modifier','UserController@updateProfile');

	Route::get('user/{id}', function($id)
	{	
		return App::make('UserController')->index($id);		
	});

	Route::get('deleteUser/{id}', function($id)
	{	
		return App::make('UserController')->deleteUser($id);		
	});
	Route::get('search','UserController@getAll');
	Route::post('search','UserController@search');
	//se deconnecter

	Route::get('logout','UserController@deconnexion');

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


	Route::get('deleteEvent/{id}',function($id){
		return App::make('EventController')->deleteEvent($id);
	});


	/*
	|--------------------------------------------------------------------------
	| Publication Route
	|--------------------------------------------------------------------------
	|
	*/

	Route::post('deletePhoto', function()
	{	
		return App::make('PublicationController')->deletePhoto();
	});
	Route::get('telechargement/{id}', function($rubric_id)
	{
		
		return App::make('PublicationController')->telechargement($rubric_id);		
	});
	Route::get('upload','PublicationController@uploadPhotos');
	Route::post('upload','PublicationController@upload_button');

	

	/*
	|--------------------------------------------------------------------------
	| Jaime Route
	|--------------------------------------------------------------------------
	|
	*/
	Route::post('addJaime','JaimeController@addJaime');
	Route::post('deleteJaime','JaimeController@deleteJaime');

	/*
	|--------------------------------------------------------------------------
	| Comment Route
	|--------------------------------------------------------------------------
	|
	*/

	Route::get('/commentaires/{id}', function($id)
	{	
		return App::make('CommentController')->index($id);
	});
	Route::post('addComment','CommentController@addComment');

	/*
	|--------------------------------------------------------------------------
	| Rubric Route
	|--------------------------------------------------------------------------
	|
	*/

	 //gallery
	Route::get('rubriques/{id}',function($id){
		return App::make('PublicationController')->CouvertureGallerie($id);
	});

	Route::post('rubriques',function(){
		$id=$_POST['id'];
		return App::make('PublicationController')->chargement($id);
	});

	Route::post('rubric/getRubrics','RubricController@getRubrics');

	// ajouter nouvelle rubrique 
	Route::get('newRubric','PublicationController@newRubric');
	Route::post('newRubric','RubricController@saveRubric');

	//telechargement en zip
	Route::get('telechargement/{id}', function($rubric_id)
	{		
		return App::make('PublicationController')->telechargement($rubric_id);		
	});

	//supprimer une rubrique (tout un dossier)
	Route::get('suppression/{id}', function($rubric_id)
	{		
		return App::make('RubricController')->supprimer($rubric_id);		
	});

});
