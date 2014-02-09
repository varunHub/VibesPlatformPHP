<?php namespace platform\core\control;

class ctlTphoner extends ctlBase implements Icontrol_base {
		public function __construct($nam, $defaultValue="")
	{
		$this->field_name = $nam;	
		$this->defaultValue = $defaultValue;
//		$this->DB_type="string";		
		parent::__construct();
	}
	
	public function genCode() {
		$s = "";
		$s .= "<label for='$this->control_name'>$this->caption". (($this->required==1)?" <em>*</em>":"") . "</label>";
		$s .= "<input type='input' name='$this->control_name' id='$this->control_name' value='$this->value' maxlength='$this->length'  size='30' class='element text' />";
		if ($this->description != "")
		{
			$s .="<span class='hints'>$this->description </span>";
		}
		return $s;
	}	
	public function genView($ver)
	{
		$s .= "<label for='$this->control_name'>$this->caption". (($this->required==1)?" <em>*</em>":"") . "</label>";
		$s .= "<input type='input' name='$this->control_name' id='$this->control_name' value='$this->value' maxlength='$this->length' readonly='readonly'  size='30' class='element text' />";
		if ($this->description != "")
		{
			$s .="<span class='hints'>$this->description </span>";
		}
		return $s;
	}
	public function genCode2() {
		$s = "";
		$s .= "<label class='description' for='$this->control_name'>$this->caption</label>
		
        <div>";
		$s .= "<input type='text' name='$this->control_name' id='$this->control_name' maxlength='$this->length'  size='30' class='element' />
        </div>";
		return $s;
	}

	public function validate(&$v) {
			$this->value = trim($this->value);
		//$v = new DataValidator();

		if ($this->required)
		{
			$v->not_empty();
			$v->string_len_min(6);
		}
	}

	public function genCodeJS() {
		$s = "";
		$s .= "$('#$this->control_name').numeric({allow: \"()+ -\"});";
		return $s;
	}

}
