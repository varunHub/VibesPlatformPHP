<?php namespace platform\core\control;

class ctlMultimover extends ctlBase implements Icontrol_base {
	
	public $multimover_sql_others;
	public $multimover_height = 6;
	public $multimover_sql_seleted;
	
	
		public function __construct($nam)
	{
		$this->field_name = $nam;
		parent::__construct();
	}
	public function genView($ver)
	{
		//TODO
	}
	public function genCode() {
		$s = "        <label  for='$this->control_name'>$this->caption</label>
        <span class='flt'>";

		$s .= vfg_Select( $this->control_name . "_mm_sel_ohs", "$this->multimover_sql_others", "$this->multimover_height", "", "1", 170, "element", false);
		$s .= "
        </span> <span class='flt'>
        <input name='" . $this->control_name . "_mm_but_sel' id='" . $this->control_name . "_mm_but_sel' value='>>' type='button'>
        <br>
        <input name='" . $this->control_name . "_mm_but_rem' id='" . $this->control_name . "_mm_but_rem' value='<<' type='button'>
        </span> <span class='flt'>";
		$s .= vfg_Select( $this->control_name . "_mm_sel_sel", "$this->multimover_sql_seleted", "$this->multimover_height", "", "1", 170, "element", false);
		$s .= "</span>
        <input type='hidden' name='" . $this->control_name . "_mm_sel_vals' id='" . $this->control_name . "_mm_sel_vals' />";
		
		return $s;
	}

	public function validate(&$v) {
	}

	public function genCodeJS() {
		$s = "
		
			$('#" . $this->control_name . "_mm_but_sel').click(function(){
        $('#" . $this->control_name . "_mm_sel_ohs option:selected').each(function(){
            $('#" . $this->control_name . "_mm_sel_sel').append($(this).clone());
            $(this).remove();
        });
    });
    $('#" . $this->control_name . "_mm_but_rem').click(function(){
        $('#" . $this->control_name . "_mm_sel_sel option:selected').each(function(){
            $('#" . $this->control_name . "_mm_sel_ohs').append($(this).clone());
            $(this).remove();
        });
    });
		
		";

		return $s;
	}

}
