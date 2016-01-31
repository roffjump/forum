<?php

Route::get('/forum', 'ForumController@index');

# local 
Route::get('/forum/{controller}/{method}', function( $controller=null, $method=null ){
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

