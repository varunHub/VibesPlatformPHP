<?php namespace platform\core\control;

class ctlTexter extends ctlBase implements Icontrol_base
{
	public $texter_alpha_numeric = "";
	public $texter_max_length;
	public $texter_min_length=0;

	public function __construct($id, $title)
	{
		parent::__construct();		
		$this->control_id = $id;
		$this->label_caption = $title;
	//	$this->DB_type="string";

	}

	function validate(&$v)
	{
		$this->value = trim($this->value);
		//$v = new DataValidator();

		if ($this->required)
		{
			$v->not_empty();
		}
		else
		{
			if ($this->texter_max_length>0)
			{
				$v->string_len_max($this->texter_max_length);
			}
			if ($this->texter_min_length>0)
			{
				$v->string_len_min($this->texter_min_length);
			}
		}
	}

	public function genView($ver)
	{
		if ($this->caption != "")
		{
			$s .= "<label for='$this->control_name' >$this->caption". (($this->required==1)?" <em>*</em>":" <em></em>") . "</label>";
		}
		$s .= "<input type='text' name='$this->control_name' id='$this->control_name' value='$this->value' maxlength='$this->texter_max_length' size='$this->texter_max_length' class='element text' readonly='readonly'/>";
		return $s;		
	}

	public function genCode()
	{
		$s  = '<div class="form-group">';
		$s .= '<label for="' . $this->control_id . '" class="col-lg-' . $this->label_width_lg . ' control-label">' . $this->label_caption . '</label>';
    	$s .= '<div class="col-lg-' . $this->control_width_lg . '">';
		$s .= '<input type="input" ';
		$s .= (($this->angular_model!="")?' ng-model="' . $this->angular_model . '.' . $this->control_id . '"':'');
		$s .= ' class="form-control" id="' . $this->control_id . '"';
		$s .= (($this->place_holder!="")?' placeholder="' . $this->place_holder . '"':'');
		$s .= (($this->disabled)?' disabled="disabled"':'');
		$s .= ' />';
    	$s .= '</div>';
  		$s .= '</div>';

//		$s .= "<input type='text' name='$this->control_name' id='$this->control_name' value='$this->value' maxlength='$this->texter_max_length' size='$this->texter_max_length' class='element text ".(($this->required==true)?"":"")."' />";
		//$s .="<label for='$this->name' generated='true' class='error'>Please enter a valid email address.</label>";
	/*	if ($this->displayGroup == "0") {
			$s .= "</div>";
		} else {
			$s .= "
		
		  </span>";
		} */
		return $this->format_html($s);
	}

	public function genCodeJS()
	{
		$s = "";
		/*
		if ($this->texter_alpha_numeric == vfgConst::Alpha)
		{
			$s .= "$('#$this->control_name').alpha({allow: \" \"});";
		}
		elseif ($this->texter_alpha_numeric == vfgConst::Numeric)
		{
			$s .= "$('#$this->control_name').numeric();";
		}
		elseif ($this->texter_alpha_numeric == vfgConst::Alphanumeric)
		{
			$s .= "$('#$this->control_name').alphanumeric({allow: \" \"});";
		}
		elseif ($this->texter_alpha_numeric != '')
		{
		$s .= "$('#$this->control_name').alphanumeric({allow: \"$this->texter_alpha_numeric\"});";
		}
		*/
		return $s;
	}
}
