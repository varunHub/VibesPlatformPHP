<?php

class Oauth_Controller extends Base_Controller {
	public $restful = true;

	public function get_index($provider) {

		Bundle::start('laravel-oauth2');

		if ($provider=='google')
		{
		$provider = OAuth2::provider($provider, array('id' => '933929993311.apps.googleusercontent.com', 'secret' => 'u7MbM0y8_iEv55WzMjJOMDJE'));
		}

		if ($provider=='facebook')
		{
		$provider = OAuth2::provider($provider, array('id' => '428771860527251', 'secret' => 'a046647adc0d4a5940cf476f03c26678'));
		}

		if (!isset($_GET['code'])) {
			// By sending no options it'll come back here
			return $provider -> authorize();
		} else {
			// Howzit?
			try {
				$params = $provider -> access($_GET['code']);

				$token = new OAuth2_Token_Access( array('access_token' => $params -> access_token));
				$user = $provider -> get_user_info($token);

				// Here you should use this information to A) look for a user B) help a new user sign up with existing data.
				// If you store it all in a cookie and redirect to a registration page this is crazy-simple.
				echo "<pre>";
				var_dump($user);
			} catch (OAuth2_Exception $e) {
				show_error('That didnt work: ' . $e);
			}

		}
	}

}
