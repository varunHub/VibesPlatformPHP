<?php namespace platform\core;

use Controller;
use View;

abstract class platformController extends Controller implements IplatformController
{
	function __construect()
	{
		Log::info('Controller Called');
	}
}


interface IplatformController
{

}