<?php namespace platform\core\control;

class ctlComber extends ctlBase implements Icontrol_base
{
	public $comber_display_sql;
	

	public function __construct($id, $label)
	{
		$this->field_name = $nam;	
		$this->defaultValue=$defaultValue;
//		$this->DB_type="string";	
		parent::__construct();	
	}
	public function setupControl()
	{
		
	}
	public function genView($ver)
	{
		if ($this->caption != "")
		{
			$s .= "<label for='$this->control_name' >$this->caption". (($this->required==1)?" <em>*</em>":" <em> </em>") . "</label>";
		}
		$s .= vfg_SelectView($this->control_name,$this->comber_display_sql,1,$this->value, 0,0,"element select", false ) ; 
		
		if ($this->description != "")
		{
			$s .="<div class='hints'>$this->description</div>";
		}
		return $s;
	}
	public function genCode()
	{
		/*
		if ($this->displayGroup == "0")
		{
			$s .= " <label class='description' for='$this->name' >$this->caption</label><div>";
		}
		else
		{
			$s .= "<label for='$this->name' >$this->caption</label>";
		}
		*/
		
		if ($this->caption != "")
		{
			$s .= "<label for='$this->control_name' >$this->caption". (($this->required==1)?" <em>*</em>":" <em> </em>") . "</label>";
		}
		
		
		$s .= vfg_select($this->control_name,$this->comber_display_sql,0,$this->value, 0,0,"element select ".(($this->required==true)?"":"")."", false ); 
		
		if ($this->description != "")
		{
			$s .="<div class='hints'>$this->description</div>";
		}
		//$s .="<div for='$this->name' generated='true' class='hints error'>Please enter a valid email address.</div>";
		/*
		if ($this->displayGroup == "0"           )
		{	 
			$s .=" </div>"; 
		}
		else
		{
			$s .= "";
		}
		*/
		return $s;
	}
	
	public function validate(&$v)
	{
		//$v = new DataValidator();
		if ($this->required)
		{
			if ( $v->value=="-" || $v->value=="")
			{
				$v->CollectErrMsg($v->description .  " is required");
			}
		}
	}
	
	public function genCodeJS()
	{
	$s="";
	
	return $s;
	}
	}

