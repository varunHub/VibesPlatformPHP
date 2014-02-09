<?php namespace platform\core\control;

class ctlBase
{
	public $primary = 'no';

	//public $name ;
	public $field_name;
	

	public $setname = "";
	public $type = "varchar";
	public $length = "";
	public $caption = "TODO_Caption";
	public $description = "";
	public $hint ="";
	public $required = false;
	public $defaultValue="";
	public $displayGroup ="";
	public $controller = "None";
	// public $DB_Key = vfgConst::No;
	public $DB_type;
	public $DB_mode = '';
	public $controlModel = "base";

	
	public $disabled		= false;

	public $control_id 		= "";
	public $control_name	= "";
	public $label_caption	= "";

	public $label_width_lg	= "3";
	public $control_width_lg= "9";
	public $place_holder	= "";
	public $angular_model	= "";
	//public $errorMsg;


	public function setToDefaultValues()
	{
		$this->value = $this->defaultValue;
	}
	public function requestValues($dataF)
	{
		$this->value = R($this->name, $this->defaultValue);
		$dataF[$this->name] = $this->value;
		//eb($this->value);
	}
	/*
	public function __set($member, $value)
	{
		$trace = debug_backtrace();
		trigger_error(
		'Undefined property call for '.$member  .
		' in ' . $trace[0]['file'] .
		' on line ' . $trace[0]['line'],
		E_USER_NOTICE);
		return null;
	}
	*/

	public function format_html($s)
	{
		return $s . PHP_EOL;
	}

	public function validater()
	{

	}

	public function setThemeSetting($base)
	{
		$this->label_width_lg		= $base->label_width_lg;
		$this->control_width_lg 	= $base->control_width_lg;
		$this->angular_model		= $base->angular_model;

	}
/*
	public function __get($member)
	{
		$trace = debug_backtrace();
		trigger_error(
		'Undefined property call for '. $member  .
	' in ' . $trace[0]['file'] .
	' on line ' . $trace[0]['line'],
		E_USER_NOTICE);
		return null;
	}
	*/
	public function __construct()
	{
		//parent::control_defaults();
		/*
		$subtab_seqno = R("subtab_seqno");	
		$this->control_name = $this->field_name;
		if ($subtab_seqno!="0" && $subtab_seqno<>"")
		{
			$this->control_name = $this->control_name . "_" . $subtab_seqno;
		} 
		*/ 
	}

	public function devCheck($para=1)
	{
		//all
		$class_vars = get_object_vars($this);
		if ($para==1)
		{
			foreach ($class_vars as $name => $value)
			{
				echo "$name : $value<br>";
			}
		}

		//only nulls
		if ($para==2)
		{
			//var_dump($class_vars);
			foreach ($class_vars as $name => $value) 
			{
				if (is_null($value))
				{
					echo "$name<br>";
				}
			}
		}

		//only nulls
		if ($para==3)
		{
			//var_dump($class_vars);
			foreach ($class_vars as $name => $value) 
			{
				eb($this->value . " -  - " . $this->type);
			}
		}


	}	
}





class vfgConst
{
	const No 		= "No";
	const Yes 		= "Yes";
}


class vfgConst_controller
{
	const None 			= "none";
	const Hidden 		= "hidden";
	const Dater 		= "dater";
	const Texter 		= "texter";
	const Selecter 		= "selecter";
	const Comber 		= "comber";
	const Uploader 		= "uploader";
	const Area 			= "area";
	const multimover	= "multimover";
	const Linker 		= "linker";
	const Pathbrowser 	= "pathbrowser";
	const Number 		= "number";
	const Slider 		= "slider";
	const Gmapper 		= "gmapper";
	const Gstreeter 	= "gstreeter";
	const Tphoner 		= "tphoner";
	const Youtuber 		= "youtuber";
}


interface Icontrol_base
{
	public function validate(&$v);
	public function genCode();
	//public function setupControl();
	public function genView($ver);	
}



/*
class vfgConst_sqltype
{
	const char = "char";
	const varchar = "varchar";
	const bigint = "bigint";
	const int = "int";
	const smallint = "smallint";
	const memo = "memo";
	const date = "date";
	const datetime = "datetime";
	const set = "set";
	const enum = "enum";
}
*/
/*
class ctlInForm
{
	const InAdd = "No";
	const InEdit = "No";
	const InFinder = "No";
	const InPrint = "No";
	const InView = "No";
}
*/
