<?php namespace platform\core\control;

class ctlUploader extends ctlBase {
	public $uploader_path;
	public $uploader_filePreFix;
	public $uploader_file_filter = "*.jpeg;*.jpg";
	public $uploader_queueSizeLimit = 1;
	public $uploader_max_file_size = 1100000;

	public $uploader_path_test;
	public $uploader_path_live;
	public $uploader_show_live;



	public $PICSTT_default;
	public $PICURL_default;
	private $PICSTT;
	private $PICURL;

	private $app_local;

	public function __construct($nam, $defaultValue="")
	{
		global $App;
		$this->app_local = $App;
		$this->field_name = $nam;
		$this->defaultValue = $defaultValue;
//		$this->DB_type = vfgConst::varchar;
		$this->controlModel="extra";
		$this->PICSTT_default=0;
		$this->PICURL_default="";

		//$C->DB_type = vfgConst::varchar;
		parent::__construct();
	}
	public function setToDefaultValues()
	{
		//$this->value = $this->defaultValue;
		$this->PICSTT	=	$this->PICSTT_default;
		$this->PICURL	=	$this->PICURL_default;
	}
	public function setDataToControl(&$data)
	{
		//TODO
		//	eB("Auddat date" . $data["AUDDAT"] );
		//$this->value = $this->defaultValue;
		$this->PICSTT	=	$data[$this->field_name . "_PICSTT"];
		$this->PICURL	=	$data[$this->field_name . "_PICURL"];
	}
	public function configThis(&$_aAllFields, &$_aFieldType, &$_data, &$_aNonInsertFieldList, &$_aNonUpdateFieldList)
	{
		$_aAllFields[$this->field_name . "_PICSTT"] = $this->control_name . "_PICSTT";
		$_aAllFields[$this->field_name . "_PICURL"] = $this->control_name . '_PICURL';

		$_aFieldType[$this->field_name . "_PICSTT"] = vfgConst::bigint;
		$_aFieldType[$this->field_name . "_PICURL"] = vfgConst::varchar;

		$_data[$this->field_name . "_PICSTT"] = $this->PICSTT_default;
		$_data[$this->field_name . "_PICURL"] = $this->PICURL_default;
	}

	public function genCode() {

		$name_ul_div = $this->control_name . "_ul_div";
		$name_ul_div_output = $this->control_name . "_ul_div_output";

		$temp_1 = "";
		if ($this->app_local->app_is_live)
		{
			$temp_showup_path = $this->uploader_show_live;
		}
		else
		{
			$temp_showup_path = $this->uploader_show_live;
		}
		if ($this->PICSTT!=0)
		{
			$temp_1 = "<img width=200px src='" . $temp_showup_path . $this->PICURL ."' />";
		}

		$s = "     <label for='$this->control_name'>$this->caption</label>
        <div class='control' ><div id='$name_ul_div_output'>$temp_1</div><div id='$name_ul_div'></div></div>
          <input type='hidden' name='$this->control_name" . "_PICURL' id='$this->control_name" . "_PICURL' value='$this->PICURL' />
          <input type='hidden' name='$this->control_name" . "_PICSTT' id='$this->control_name" . "_PICSTT' value='$this->PICSTT' />
        ";
		return $s;
	}

	public function genView($ver)
	{
		//TODO
	}
	public function genCodeJS() {

		if ($this->app_local->app_is_live)
		{
			$temp_upload_path = $this->uploader_path_live;
			$temp_showup_path = $this->uploader_show_live;
		}
		else
		{
			$temp_upload_path = $this->uploader_path_test;
			$temp_showup_path = $this->uploader_show_live;
		}

		$s = "
$(document).ready(function() {

$('#" . $this->control_name . "_ul_div').fileUpload({
'uploader' : '../uploadify/uploader.swf',
'script' : '../uploadify/upload.php',
'folder' : '$temp_upload_path',
'cancelImg' : '../uploadify/cancel.png',
'fileExt' : '*.jpeg;*.jpg',
'buttonText' : 'Click to upload',
'filePreFix' : '" . $this->uploader_filePreFix . "',
'width' : '300',
'auto' : true,
'sizeLimit' : $this->uploader_max_file_size,
'queueSizeLimit' : '$this->uploader_queueSizeLimit',
onComplete : function(event, queueID, fileObj, response, data) {
$('#" . $this->control_name . "_PICURL').val(response);
$('#" . $this->control_name . "_PICSTT').val('1');
$('#" . $this->control_name . "_ul_div_output').html('<img width=\"200px\" src=\"$temp_showup_path' + response + '\"><br>').fadeIn('slow');
}
});
});"; 
		return $s;
	}

	public function validate(&$v) {
	}

}
