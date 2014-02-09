<?php namespace platform\core\control;

class ctlSelecter extends ctlBase implements Icontrol_base
{
	public $selecter_display_sql;
	public $selecter_mode;


	public $angular_select_id 		= "";
	public $angular_select_field 	= "";
	public $angular_select_data 	= "";


	public function __construct($id, $title="")
	{
		parent::__construct();		
		$this->control_id = $id;
		$this->label_caption = $title;
	}
	
	public function genView($ver)
	{
		//TODO
		//$s .= vfg_SelectView($this->name,$this->comber_display_sql,1,$this->value, 0,0,"element select", false ) 
		$s = "<label for='$this->control_name'>$this->caption". (($this->required==1)?" <em>*</em>":"") . "</label>";
		$s .= vfg_selectView("$this->control_name", $this->selecter_display_sql, "2", $this->value, $this->selecter_mode, 200, "element select", false);
		return $s;		
		
		
	}

	public function genCode() {





		$s  = '<div class="form-group">';
		$s .= '<label class="col-lg-' . $this->label_width_lg . ' control-label" for="' . $this->control_id . '" >' . $this->label_caption . '</label>';
		$s .= '<div class="col-lg-' . $this->control_width_lg . '">';
		$s .= '<select id="' . $this->control_id . '" class="form-control" ng-options="c.' . $this->angular_select_id . ' as c.' . $this->angular_select_field . ' for c in ' . $this->angular_select_data . '" ng-model="' . $this->angular_model . '.' . $this->control_id . '" >';
		$s .= '</select>';
		$s .= '</div>';
		$s .= '</div>';

//		$s = "<label for='$this->control_name'>$this->caption". (($this->required==1)?" <em>*</em>":"") . "</label>";
//		$s .= vfg_select("$this->control_name", $this->selecter_display_sql, "8", $this->value, $this->selecter_mode, 200, "element select", false);
//		$s .= "";
		
		
		return $s;
	}

	public function validate(&$v) {
		
		//var_dump($v->value);
		
		if ($this->required)
		{
			if ( $v->value=="-" || $v->value=="")
			{
				$v->CollectErrMsg($v->description .  " is required");
			}
		}
	}

	public function genCodeJS() {
		$s = "";

		return $s;
	}

}
