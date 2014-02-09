<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/test', function() {return View::make('layouts.base'); });
Route::get('/foo', function() { return View::make('layouts.foo'); });


Route::get('/', function()
{
	if (Auth::check())
	{
		return View::make('user.you-are-in');
	}
	else{
		return View::make('user.login') -> with('notice', 'Please login or Join to view the home page')->with('type','block');
	}
});


Route::any('login', array('uses' => 'auth@login'));
Route::get('logout', array('uses' => 'auth@logout'));


Route::get('oauth/(:any)', 'oauth@index');
Route::filter('oauth2', function()
{
    try {
        $oauth = new OAuth2Server\Libraries\OAuth2(new OAuth2StorageLaravel());
        $token = $oauth->getBearerToken();
        $oauth->verifyAccessToken($token);
    } catch (OAuth2Server\Libraries\OAuth2ServerException $oauthError) {
        $oauthError->sendHttpResponse();
    }
});



//Route::get('oauth/session/(:any)', 'oauth@session');




Route::post('user/news/upload', function()
{
    $filename = md5(time());
    Input::upload('imageName', 'img/news/'.$filename);
    return '<div id="image">'.URL::to_asset('img/news/'.$filename).'</div>';
});


Route::get('recipes', array('uses'=>'recipes@index'));
Route::get('recipes/list', array('uses'=>'recipes@page'));
Route::get('recipe/(:any)', array('uses'=>'recipes@single'));

Route::get ('user/recipes', array('uses'=>'recipes@user_index'));
Route::get ('user/recipes/list', array('uses'=>'recipes@user_page'));
Route::get ('user/recipe/(:any)', array('uses'=>'recipes@user_single'));
Route::post('user/recipe/(:any)', array('uses'=>'recipes@user_single_save'));

Route::get('api/recipes', 	array('as'=>'recipes', 	'uses'=>'recipes@json_index'));
Route::get('api/recipes/(:any)', 	array('as'=>'recipe', 	'uses'=>'recipes@show'));
Route::get('api/recipes/new', 	array('as'=>'new_recipes', 	'uses'=>'recipes@new'));
Route::get('api/recipes/(:any)edit', 	array('as'=>'edit_recipes', 	'uses'=>'recipes@edit'));

Route::post('api/recipes', 			'recipes@create');
Route::put ('api/recipes/(:any)', 	'recipes@update');
Route::delete('api/recipes/(:any)', 'recipes@destroy');

//Route::get('recipe/(:num)', function($id)
//{});

/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application. The exception object
| that is captured during execution is then passed to the 500 listener.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function($exception)
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Route::get('/', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
	//echo "<h1>before</h1>";
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
	//echo "<h1>after</h1>";
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('pattern: user/*', array('name' => 'auth', function()
{
    if (Auth::guest()) return Redirect::to('login');
     
}));



//Route::filter('pattern: user/*', 'auth');
