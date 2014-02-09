<?php namespace platform\core\control;

class ctlArea extends ctlBase implements Icontrol_base {
	
	public $area_cols;
	public $area_rows;
	public $area_alpha_numeric;

	private $name_ul_div;
	
		
	public function __construct($id, $label)
	{
		$this->field_name = $nam;
		$this->defaultValue=$defaultValue;
//		$this->DB_type="string";
		parent::__construct();
	}

	public function genView($ver)
	{
		$this->name_ul_div = $this->control_name . "_ul_div";
		
		$s = "<label for='$this->control_name'>$this->caption". (($this->required==1)?" <em>*</em>":"") . "</label>";

		
		$s .= vfg_AreaView($this->control_name, $this->value, $this->area_cols, $this->area_rows, "element textarea", false);
		

		
		if ($this->description != "")
		{
			$s .="<div class='hints'>$this->description</div>";
		}
		
		$s .= "";
		return $s;
	}
	public function genCode() {
		
		$this->name_ul_div = $this->control_name . "_ul_div";
		
		$s = "<label for='$this->control_name'>$this->caption". (($this->required==1)?" <em>*</em>":"") . "</label>";

		
		$s .= vfg_Area($this->control_name, $this->value, $this->area_cols, $this->area_rows, "element textarea", false);

		
		if ($this->description != "")
		{
			$s .="<div class='hints'>$this->description</div>";
		}
		
		$s .= "";
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

	public function genCodeJS() {
		$s = "";
		if ($this->area_alpha_numeric != '')
		{
		$s .= "$('#$this->control_name').alphanumeric({allow: \"$this->area_alpha_numeric\"});";
		}
		return $s;
	}

}
?>