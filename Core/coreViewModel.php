<?php namespace platform\core;

use Eloquent;

abstract class coreViewModel extends Eloquent implements ICoreViewModel
{
    public static $validationMessages = null;
    public static $validationMessagesJson = null;
    public static $input        = null;
    public static $active       = 1;
    public static $locked       = 0;
    public static $updated_by   = 0;

    public function __construct()
    {
        $this->setup();
    }

    public function setup()
    {
        
    }
}

interface ICoreViewModel
{
    //abstract protected function setup();
}