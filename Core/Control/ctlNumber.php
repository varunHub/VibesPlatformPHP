<?php namespace platform\core\control;

class ctlNumber extends ctlBase implements Icontrol_base {
		public function __construct($nam, $defaultValue=0)
	{
		$this->field_name = $nam;	
		$this->defaultValue = $defaultValue;
//		$this->DB_type="real";
		parent::__construct();	
	}
	
	public function genView($ver)
	{
		$s = "    <label class='description' for='$this->control_name'>$this->caption". (($this->required==1)?" <em>*</em>":"") . "</label>
        <div>
          <input type='text' name='$this->control_name' id='$this->control_name' maxlength='60'  size='60' readonly='readonly'  class='element ".(($this->required==true)?"required":"")."'/>
        </div>";
		return $s;
	}
	public function genCode() {
		$s = "    <label class='description' for='$this->control_name'>$this->caption". (($this->required==1)?" <em>*</em>":"") . "</label>
        <div>
          <input type='text' name='$this->control_name' id='$this->control_name' maxlength='60'  size='60'  class='element ".(($this->required==true)?"required":"")."'/>
        </div>";
		return $s;
	}

	public function validate(&$v) {
	}

	public function genCodeJS() {
		$s = "";
$s .= "$('#$this->control_name').alphanumeric({allow: \"-.\"});";
		return $s;
	}

}
