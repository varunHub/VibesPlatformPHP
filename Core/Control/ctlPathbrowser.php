<?php namespace platform\core\control;
//TODO implements Icontrol_base
class ctlPathbrowser extends ctlBase  {
	public function __construct($nam)
	{
		$this->field_name = $nam;
		parent::__construct();
	}
	

	public function genCode() {
		$s = " <label class='description' for='$this->control_name'>$this->caption</label>
        <div id='$this->control_name' class='control' >*</div>
        <br style='clear:both;' />";
		//vfg_Select_DB("$this->name_pb_sel","select $this->pathbrowser.sql_field_id, $this->pathbrowser.sql_field_name from $this->pathbrowser.sql_table where $this->pathbrowser.sql_field_parent=0 and stt=1","$this->pathbrowser.height", "1", 0, 300, "$this->name_pb_sel_cls" );
		//vfg_Select_DB("$this->name_msm_sel_sel","$this->multimover.sql_seleted","$this->multimover.height","1");
		return $s;
	}

	public function validate() {
	}

	public function genCodeJS() {
		$s = "";

		return $s;
	}
	public function genView($ver)
	{
		//TODO
	}

}
