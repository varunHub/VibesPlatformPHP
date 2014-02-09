<?php namespace platform\core\control;

class ctlTokener extends ctlBase implements Icontrol_base
{
	public $hintText ="";
	public $noResultsText  = "";
	public $searchingText = "";
	public $deleteText = "";

	public $searchDelay = 0;
	public $minChars = 3;
	public $tokenLimit = 0;
	
	public $animateDropdown = true;
	public $tokenDelimiter ="";
	public $preventDuplicates = true;
	public $prePopulate =""; // jSON
	public $theme = "";
	public $JSONdata = "";

	public $propertyToSearch = "";
	public $resultsFormatter = "";
	public $tokenFormatter = "";

	public function __construct($id, $title)
	{
		parent::__construct();		
		$this->control_id = $id;
		$this->label_caption = $title;

	}


	public function validate(&$v)
	{}

	public function genCode()
	{
		$s  = '<div class="form-group">';
		$s .= '<label for="' . $this->control_id . '" class="col-lg-' . $this->label_width_lg . ' control-label">' . $this->label_caption . '</label>';
    	$s .= '<div class="col-lg-' . $this->control_width_lg . '">';
		$s .= '<input type="text" ';
		$s .= (($this->angular_model!="")?' ng-model="' . $this->angular_model . '.' . $this->control_id . '"':'');
		$s .= ' class="form-control" id="' . $this->control_id . '" ';
		$s .= (($this->place_holder!="")?' placeholder="' . $this->place_holder . '"':'');
		$s .= (($this->disabled)?' disabled="disabled"':'');
		$s .= ' />';
    	$s .= '</div>';
  		$s .= '</div>';	

  		return $this->format_html($s);	
	}

	public function genCodeJS()
	{
		$s  = "";

		$s .= '$("#' . $this->control_id . '").tokenInput(' . $this->JSONdata . ', {' ;

			$s .= ($this->hintText!="")?"hintText:'" . $this->hintText . "', ":"";
			$s .= ($this->noResultsText!="")?"noResultsText:'" . $this->noResultsText . "', ":"";
			$s .= ($this->searchingText!="")?"searchingText:'" . $this->searchingText . "', ":"";
			$s .= ($this->deleteText!="")?"deleteText:'" . $this->deleteText . "', ":"";
			$s .= ($this->theme!="")?"theme:'" . $this->theme . "', ":"";
			$s .= ($this->tokenDelimiter!="")?"tokenDelimiter:'" . $this->tokenDelimiter . "', ":"";
			
			$s .= ($this->minChars!=0)?"minChars:" . $this->minChars . ", ":"";
			$s .= ($this->tokenLimit!=0)?"tokenLimit:" . $this->tokenLimit . ", ":"";
			
			$s .= "preventDuplicates:" . (($this->preventDuplicates==true)?"true":"false") . ", ";
			$s .= "animateDropdown:" . (($this->animateDropdown==true)?"true":"false") . ", ";
			
			$s .= ($this->propertyToSearch!="")?"propertyToSearch: " . $this->propertyToSearch . " , ":"";
			$s .= ($this->resultsFormatter!="")?"resultsFormatter: " . $this->resultsFormatter . " , ":"";
			$s .= ($this->tokenFormatter!="")?"tokenFormatter: " . $this->tokenFormatter . " , ":"";

		$s .= "});";

		return $s;
	}

	public function genView($ver)
	{}

}