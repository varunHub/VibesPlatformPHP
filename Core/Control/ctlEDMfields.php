<?php namespace platform\core\control;

class ctlEDMfields
{
	//$App = $new vibesApplicationLoader();
	
	
	
	public $area_cols;
	public $area_rows;
	public $area_alpha_numeric;
	
	public $lvUSESTT;
	public $lvSTRUSE;
	public $lvSTRDAT;
	public $lvAUDUSE;
	public $lvAUDDAT;
	public $lvADMUSE;
	public $lvADMDAT;
	public $lvADMSTT;
	
	public $USESTT_default = 'edited';
	public $STRUSE_default = 0;
	public $STRDAT_default;
	public $AUDUSE_default = 0;
	public $AUDDAT_default;
	public $ADMUSE_default = 0;
	public $ADMDAT_default;
	public $ADMSTT_default = 'edited';
	
	private $app_local;
		
	public function __construct($id, $label)
	{
		global $App;
		$this->app_local = $App;	
		
		$this->name = $nam;
		$this->defaultValue="";
		
		$this->STRDAT_default = date("Y-m-d H:i:s");
		$this->AUDDAT_default = $this->STRDAT_default;
		$this->ADMDAT_default = $this->STRDAT_default;
		
		$this->STRUSE_default = $this->app_local->userID;
		$this->AUDUSE_default = $this->app_local->userID;
		$this->ADMUSE_default = $this->app_local->userID;
		
	}
	public function genView($ver)
	{
		//TODO
	}	
	public function genCode() {
				
		$s = "<label for='$this->name'>$this->caption</label>";

		$s .= "<p>USESTT<input type='input' id='USESTT' value='$this->lvUSESTT' /></p>";
		$s .= "<p>STRUSE<input type='input' id='STRUSE' value='$this->lvSTRUSE' /></p>";
		$s .= "<p>STRDAT<input type='input' id='STRDAT' value='$this->lvSTRDAT' /></p>";
		$s .= "<p>AUDUSE<input type='input' id='AUDUSE' value='$this->lvAUDUSE' /></p>";
		$s .= "<p>AUDDAT<input type='input' id='AUDDAT' value='$this->lvAUDDAT' /></p>";
		$s .= "<p>ADMUSE<input type='input' id='ADMUSE' value='$this->lvADMUSE' /></p>";
		$s .= "<p>ADMSTT<input type='input' id='ADMSTT' value='$this->lvADMSTT' /></p>";
		$s .= "<p>ADMDAT<input type='input' id='ADMDAT' value='$this->lvADMDAT' /></p>";
		
		$s = "";
		return $s;
	}

	public function validate(&$v) {
	}

	public function setDataToControl(&$data)
	{
		//TODO
	//	eB("Auddat date" . $data["AUDDAT"] );
		//$this->value = $this->defaultValue;
		$this->lvUSESTT	=	$data["USESTT"];
		$this->lvSTRUSE	=	$data["STRUSE"];
		$this->lvSTRDAT	=	$data["STRDAT"];
		$this->lvAUDUSE	=	$data["AUDUSE"];
		$this->lvAUDDAT	=	$data["AUDDAT"];
		$this->lvADMUSE	=	$data["ADMUSE"];
		$this->lvADMDAT	=	$data["ADMDAT"];
		$this->lvADMSTT =	$data["ADMSTT"];
	}
	public function configThis(&$_aAllFields, &$_aFieldType, &$_data, &$_aNonInsertFieldList, &$_aNonUpdateFieldList)
	{
		$_aAllFields['USESTT'] = 'USESTT';
		$_aAllFields['STRUSE'] = 'STRUSE';
		$_aAllFields['STRDAT'] = 'STRDAT';
		$_aAllFields['AUDUSE'] = 'AUDUSE';
		$_aAllFields['AUDDAT'] = 'AUDDAT';
		$_aAllFields['ADMUSE'] = 'ADMUSE';
		$_aAllFields['ADMSTT'] = 'ADMSTT';
		$_aAllFields['ADMDAT'] = 'ADMDAT';
		
		$_aFieldType['USESTT'] = vfgConst::enum;
		$_aFieldType['STRUSE'] = vfgConst::bigint;
		$_aFieldType['STRDAT'] = vfgConst::datetime;
		$_aFieldType['AUDUSE'] = vfgConst::bigint;
		$_aFieldType['AUDDAT'] = vfgConst::datetime;
		$_aFieldType['ADMUSE'] = vfgConst::bigint;
		$_aFieldType['ADMSTT'] = vfgConst::enum;
		$_aFieldType['ADMDAT'] = vfgConst::datetime;
		
		$_data['USESTT'] = $this->USESTT_default;
		$_data['STRUSE'] = $this->STRUSE_default;
		$_data['STRDAT'] = $this->STRDAT_default;
		$_data['AUDUSE'] = $this->AUDUSE_default;
		$_data['AUDDAT'] = $this->AUDDAT_default;
		$_data['ADMUSE'] = $this->ADMUSE_default;
		$_data['ADMSTT'] = $this->ADMSTT_default;
		$_data['ADMDAT'] = $this->ADMDAT_default;
		
		
		eb($this->app_local->adminMode);
		
		if ($this->app_local->adminMode == true)
		{
			$_aNonUpdateFieldList['USESTT']  =vfgConst::NoUpdate;
			$_aNonUpdateFieldList['STRUSE']  =vfgConst::NoUpdate;
			$_aNonUpdateFieldList['STRDAT']  =vfgConst::NoUpdate;
			$_aNonUpdateFieldList['AUDUSE']  =vfgConst::NoUpdate;
			$_aNonUpdateFieldList['AUDDAT']  =vfgConst::NoUpdate;
		}
		if ($this->app_local->userMode== true)
		{
			
			$_aNonUpdateFieldList['STRUSE']  =vfgConst::NoUpdate;
			$_aNonUpdateFieldList['STRDAT']  =vfgConst::NoUpdate;
			$_aNonUpdateFieldList['ADMUSE']  =vfgConst::NoUpdate;
			$_aNonUpdateFieldList['ADMSTT']  =vfgConst::NoUpdate;
			$_aNonUpdateFieldList['ADMDAT']  =vfgConst::NoUpdate;
		
			$_aNonInsertFieldList['ADMUSE'] = vfgConst::NoInsert;
			$_aNonInsertFieldList['ADMSTT'] = vfgConst::NoInsert;
			$_aNonInsertFieldList['ADMDAT'] = vfgConst::NoInsert;
		}
		
	}
	
	public function setToDefaultValues()
	{
		//$this->value = $this->defaultValue;
		$this->lvUSESTT	=	$this->USESTT_default;
		$this->lvSTRUSE	=	$this->STRUSE_default;
		$this->lvSTRDAT	=	$this->STRDAT_default;
		$this->lvAUDUSE	=	$this->AUDUSE_default;
		$this->lvAUDDAT	=	$this->AUDDAT_default;
		$this->lvADMUSE	=	$this->ADMUSE_default;
		$this->lvADMDAT	=	$this->ADMDAT_default;
		$this->lvADMSTT =	$this->ADMSTT_default;
	}	
	public function getDefaultValues($f)
	{
		$f["USESTT"]	=	$this->USESTT_default;
		$f["STRUSE"]	=	$this->STRUSE_default;
		$f["STRDAT"]	=	$this->STRDAT_default;
		$f["AUDUSE"]	=	$this->AUDUSE_default;
		$f["AUDDAT"]	=	$this->AUDDAT_default;
		$f["ADMUSE"]	=	$this->ADMUSE_default;
		$f["ADMDAT"]	=	$this->ADMDAT_default;
		$f["ADMSTT"]	=	$this->ADMSTT_default;
	}
	public function genCodeJS() {
		$s = "";
		if ($this->area_alpha_numeric != '')
		{
	//	$s .= "$('#$this->name').alphanumeric({allow: \"$this->area_alpha_numeric\"});";
		}
		return $s;
	}

}
