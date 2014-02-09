<?php namespace platform\core\control;

class ctlComber extends ctlBase implements Icontrol_base
{
	public function __construct($id, $label)
	{
		$this->field_name = $nam;	
		parent::__construct();
	}
	public function genCode()
	{
		$s = "
		<label class='description' for='" .$this->control_name . "_Street'>$this->caption</label>
<div>
  <input id='" .$this->control_name . "_Street' name='" .$this->control_name . "_Street' class='element text large' value='' type='text'>
  <label for='" .$this->control_name . "_Street'>Street Address</label>
</div>
<div>
  <input id='" .$this->control_name . "_Line' name='" .$this->control_name . "_Line' class='element text large' value='' type='text'>
  <label for='" .$this->control_name . "_Line'>Address Line 2</label>
</div>
<div class='left'>
  <input id='" .$this->control_name . "_City' name='" .$this->control_name . "_City' class='element text medium' value='' type='text'>
  <label for='" .$this->control_name . "_City'>City</label>
</div>
<div class='right'>
  <input id='" .$this->control_name . "_State' name='" .$this->control_name . "_State' class='element text medium' value='' type='text'>
  <label for='" .$this->control_name . "_State'>State / Province / Region</label>
</div>
<div class='left'>
  <input id='" .$this->control_name . "_Zip' name='" .$this->control_name . "_Zip' class='element text medium' maxlength='15' value='' type='text'>
  <label for='" .$this->control_name . "_Zip'>Postal / Zip Code</label>
</div>
<div class='right'>
  <select class='element select medium' id='ç' name='" .$this->control_name . "_Country'>
    <option value='' selected='selected'></option>
    <option value='Afghanistan'>Afghanistan</option>
  </select>
  <label for='" .$this->control_name . "_Country'>Country</label>
</div>";
return $s;
}
	
	public function validate()
	{}
	
	public function genView($ver)
	{
		//TODO
	}
		 	public function genCodeJS()
	{
		$s="";
		
		return $s;
	}
}
