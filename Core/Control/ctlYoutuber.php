<?php namespace platform\core\control;
// TODO implements Icontrol_base
class ctlYoutuber extends ctlBase
{
  public function __construct($nam)
  {
    $this->field_name = $nam;
    parent::__construct();
  }
	

	public function genCode()
  {
		    $s = "   <label class='description' for='" . $this->control_name . "'>$this->caption</label>
        <div>
          <input name='" . " . $this->control_name . " . "_yt_url' id='" . " . $this->control_name . " . "_yt_url' type='text' value='http://www.youtube.com/watch?v=I4FFgSmd8NU&feature=feedu' size='70' maxlength='60' class='element'>
          <input type='button' name='" . $this->control_name . "_yt_preview' id='" . $this->control_name . "_yt_preview' value='Preview' />
          <table width='380' border='0' cellpadding='2' cellspacing='2' class='control'>
            <tr>
              <td width='220' rowspan='2'><input name='" . $this->control_name . "_yt_codec' id='" . $this->control_name . "_yt_codec' type='hidden' >
                <div id='" . $this->control_name . "_yt_but_preview' style='float:left;'>-</div></td>
              <td width='60' style='background-color:'red'; padding:4px;' ><img id='" . $this->control_name . "_yt_img1' class='" . $this->control_name . "_yt_img_cls' src='f.jpg' /></td>
              <td width='60' style='background-color:'red'; padding:4px;' ><img id='" . $this->control_name . "_yt_img2' class='" . $this->control_name . "_yt_img_cls' src='f.jpg' /></td>
            </tr>
            <tr>
              <td width='60' style='background-color:'red'; padding:4px;' ><img id='" . $this->control_name . "_yt_img3' class='" . $this->control_name . "_yt_img_cls' src='f.jpg' /></td>
              <td width='60' style='background-color:'red'; padding:4px;' >&nbsp;</td>
            </tr>
            <tr>
              <td colspan='3' rowspan='2'><label for='" . $this->control_name . "_yt_desc'>Subject</label>
                <input name='" . $this->control_name . "_yt_subj' id='" . $this->control_name . "_yt_subj' type='text' value='' size='40' maxlength='60' class='element'>
                <br />
                <label for='" . $this->control_name . "_yt_desc'>Description</label>
                <textarea cols='40' id='" . $this->control_name . "_yt_desc' name='_yt_desc' class='element' ></textarea>
                <br />
                <label for='" . $this->control_name . "_yt_imgs'>Image</label>
                <input name='" . $this->control_name . "_yt_imgs' id='" . $this->control_name . "_yt_imgs' type='text' value='' size='40' class='element' maxlength='60'></td>
            </tr>
          </table>
        </div>";
		return $s;
	}

	public function genCodeJS()
  {
		$s = '';
		return $s;
	}

	public function validate(){}

}
