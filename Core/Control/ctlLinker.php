<?php namespace platform\core\control;

class ctlLinker extends ctlBase implements Icontrol_base
{
	public function __construct($nam, $defaultValue="")
	{
		$this->field_name = $nam;	
		$this->defaultValue = $defaultValue;
		$this->DB_type="string";
		parent::__construct();
				
	}
	public function genCode()
	{
		$name_cmd = $this->control_name . "_cmd";
		$s = "  <label for='$this->control_name'>$this->caption". (($this->required==1)?" <em>*</em>":"") . "</label>
      
        <input type='button' name='$name_cmd' id='$name_cmd' value='^' class='element' />
        <input type='text' name='$this->control_name' id='$this->control_name' maxlength='60'  size='60' class='element ".(($this->required==true)?"required":"")."' />
       ";
		return $s;
	}
		public function genCodeJS()
	{
		$name_cmd = $this->control_name . "_cmd";
		$s="
	
		$('#$this->control_name').alphanumeric({allow: \"_-./:\"});		
		$('#$name_cmd').click(function(){
			s= $('#$this->control_name').val();
			if (s !='')
			{
				window.open(s);
			}
			return false;
		});
	";
		return $s;
	}
	
}
	