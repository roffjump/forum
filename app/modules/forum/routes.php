<?php

Route::get('/forum', 'ForumController@index');

# local 
Route::get('/forum/topic/all', 'TopicController@all');
Route::any('/forum/topic/create', 'TopicController@create');
Route::get('/forum/topic/show/{id?}', 'TopicController@show');

Route::post('/forum/topic/{id}/create/answer', 'TopicController@answer');

/*================================
=            REST API            =
================================*/

Route::get('/forum/rest/api/{controller}/{method}', function( $controller=null, $method=null ){
	try {
		$class = ucfirst($controller.'Controller');
		$f = new $class();
	} catch (Exception $e) {
		return Response::json( ['message'=> 'The controller does not exists', 'error' => $e ] );		
	}
	try {
		return Response::json($f->{$method}( Input::all() ));
	} catch (Exception $e) {
		return Response::json( ['message'=> 'The method you are trying to call does not exists', 'error' => $e ] );		
	}
});

/*=====  End of REST API  ======*/

