<?php
class Auth_Controller extends Base_Controller {

	public $restful = true;

	public function get_login()
	{
		if (Auth::check()) {
			return View::make('user.you-are-in') -> with('notice', 'Already loged in')->with('type','block');
		} else {
			return View::make('user.login');// -> with('notice', 'Welcome')->with('type','success');
		}
	}

	public function get_logout()
	{
		Auth::logout();
		return Redirect::to('login');
	}

	public function post_login()
	{
		$credentials = array('username' => Input::get('email'), 'password' => Input::get('password'));
		if (Auth::attempt($credentials)) {
			//return Redirect::to('login')->with('flash_notice', 'You are successfully logged in.');
			return View::make('user.you-are-in');
		} else {
			return View::make('user.login') -> with('notice', 'Incorrect User ID Or Password, Please try again')->with('type','block');
		}
	}
}