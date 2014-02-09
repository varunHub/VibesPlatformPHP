<?php namespace platform\core\control;

class ctlSlider extends ctlBase implements Icontrol_base
{
		public function __construct($nam)
	{
		$this->field_name = $nam;
		parent::__construct();
	}
	
	public function genView($ver)
	{
		//TODO
	}
	public function genCode()
	{}
	
	public function validate(&$v)
	{}
	public function setupControl()
	{
		
	}
	public function genCodeJS()
	{
		$s="";
		
		return $s;
	}
}
