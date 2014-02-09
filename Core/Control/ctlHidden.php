<?php namespace platform\core\control;

class ctlHidden  extends ctlBase implements Icontrol_base
{
	public $hidden_show_read_only = 'no';
	public $displayText;
	public $hide_when_value="";
	public function __construct($id, $label="")
	{
		$this->field_name = $nam;
		$this->defaultValue =$defaultValue;
		$this->displayText = "";
		//$this->DB_type = (is_string($var)?"string":"number");
		$this->hide_when_value="";
		
		//$this->defaultValue($val) = $val;
		parent::__construct();
	}

	public function genView($ver)
	{
		
	}
	public function genCode()
	{
		$name_R = $this->control_name . "_R";
		$s="";
		if ($this->hidden_show_read_only=='yes' )
		{
			if ($this->hide_when_value=="")
			{
				$s .= "<label for='$name_R'>$this->caption</label><input type='text' name='$name_R' id='$name_R' value='$this->value' disabled='disabled'  class='element text' />\n";
			}
			else 
			{
				if ($this->hide_when_value!=$this->value)
				{
					$s .= "<label for='$name_R'>$this->caption</label><input type='text' name='$name_R' id='$name_R' value='$this->value' disabled='disabled'  class='element text' />\n";
				}
			}
		}
		$s .= "<input type='hidden' name='$this->control_name' id='$this->control_name' value='$this->value' />\n";
		return $s;
	}

	public function validate(&$v)
	{}

	public function defaultValue($val)
	{
		$this->lvalue = $val;
	}
	public function genCodeJS()
	{
		$s="";

		return $s;
	}
}

