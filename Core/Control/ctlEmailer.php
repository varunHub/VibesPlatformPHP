<?php namespace platform\core\control;

class ctlEmailer extends ctlBase implements Icontrol_base
{
	public function __construct($id, $label)
	{
		$this->field_name = $nam;	
		$this->defaultValue=$defaultValue;
//		$this->DB_type="string";	
		parent::__construct();	
	}
	
	public function genView($ver)
	{
		$name_a = $this->control_name . "";
		$s="<label for='$name_a'>$this->caption". (($this->required==1)?" <em>*</em>":"") . "</label><input type='text' name='$this->control_name' id='$this->control_name'  value='$this->value' maxlength='60'  size='60' readonly='readonly'  class='element text email ".(($this->required==true)?"":"")."'/>
       ";
		return $s;	}
	public function genCode()
	{
		$name_a = $this->control_name . "";
		$s="<label for='$name_a'>$this->caption". (($this->required==1)?" <em>*</em>":"") . "</label><input type='text' name='$this->control_name' id='$this->control_name'  value='$this->value' maxlength='60'  size='60'  class='element text email ".(($this->required==true)?"":"")."'/>
       ";
		return $s;
	}
	public function validate(&$v)
	{
			$this->value = trim($this->value);
		//$v = new DataValidator();

		if ($this->required)
		{
			$v->not_empty();
		}
	}
	
		public function genCodeJS()
	{
		$s="";
		$s .= "$('#$this->control_name').alphanumeric({allow: \"@_-.\"});";
		return $s;
	}
}
