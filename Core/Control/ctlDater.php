<?php namespace platform\core\control;

class ctlDater extends ctlBase implements Icontrol_base
{
	public $dater_format;
	public $dater_changeMonth;
	public $dater_changeYear;
	
	
	public function __construct($id, $label)
	{
		$this->field_name = $nam;	
		$this->defaultValue=$defaultValue;
//		$this->DB_type="datetime";
		parent::__construct();
		
	}
		public function genCode()
	{
		$s = "
		        <label class='description' for='$this->control_name'>$this->caption". (($this->required==1)?" <em>*</em>":"") . "</label>
        <div>
          <input type='input' name='$this->control_name' id='$this->control_name' maxlength='12' size='12'  class='element' value='$this->value' />
        </div>";
		return $s;
	}
	
	public function validate(&$v)
	{}

	public function genView($ver)
	{
		//TODO
	}
	
		public function genCodeJS()
	{
		$s="";
		$s .= "$('#$this->control_name').datepicker();\n";
		$s .= "$('#$this->control_name').datepicker( 'option', 'dateFormat', '$this->dater_format' );\n";
		$s .= "$('#$this->control_name').datepicker( 'option', 'changeMont', $this->dater_changeMonth );\n";
		$s .= "$('#$this->control_name').datepicker( 'option', 'changeYear', $this->dater_changeYear );\n";
		$s .= "$('#$this->control_name').datepicker( 'option', 'currentText', 'Now' );\n";
		return $s;
	}
}
	