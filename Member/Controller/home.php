<?php

class Home_Controller extends Base_Controller {

	/*
	|--------------------------------------------------------------------------
	| The Default Controller
	|--------------------------------------------------------------------------
	|
	| Instead of using RESTful routes and anonymous functions, you might wish
	| to use controllers to organize your application API. You'll love them.
	|
	| This controller responds to URIs beginning with "home", and it also
	| serves as the default controller for the application, meaning it
	| handles requests to the root of the application.
	|
	| You can respond to GET requests to "/home/profile" like so:
	|
	|		public function action_profile()
	|		{
	|			return "This is your profile!";
	|		}
	|
	| Any extra segments are passed to the method as parameters:
	|
	|		public function action_profile($id)
	|		{
	|			return "This is the profile for user {$id}.";
	|		}
	|
	*/

	public function action_index()
	{
		echo vaR_dump(Auth::check());
		return View::make('home.index');
	}
	
	
	
	public function action_session($provider='facebook')
{
    Bundle::start('laravel-oauth2');

    $provider = OAuth2::provider($provider, array(
        'id' => '428771860527251',
        'secret' => 'a046647adc0d4a5940cf476f03c26678',
		'redirect_uri' => 'ulavi.com'
    ));

    if ( ! isset($_GET['code']))
    {
        // By sending no options it'll come back here
        return $provider->authorize();
    }
    else
    {
        // Howzit?
        try
        {
            $params = $provider->access($_GET['code']);

                $token = new OAuth2_Token_Access(array('access_token' => $params->access_token));
                $user = $provider->get_user_info($token);

            // Here you should use this information to A) look for a user B) help a new user sign up with existing data.
            // If you store it all in a cookie and redirect to a registration page this is crazy-simple.
            echo "<pre>";
            var_dump($user);
        }

        catch (OAuth2_Exception $e)
        {
            show_error('That didnt work: '.$e);
        }

    }
}

}