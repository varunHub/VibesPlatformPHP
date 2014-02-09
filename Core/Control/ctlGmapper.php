<?php namespace platform\core\control;

class ctlGmapper extends ctlBase implements Icontrol_base
{
	public $gmapper_map_height = 250;
	public $gmapper_map_width = 450;
	public $gmapper_default_address = "london";
	
		public function __construct($id, $label)
	{
		$this->field_name = $nam;
		parent::__construct();
		
	}
	public function setupControl()
	{
		
	}
	public function genView($ver)
	{
		//TODO
	}
	public function genCode()
	{
		
		$s = "
		
		
    <form action='#' onsubmit='showAddress(this.address.value); return false'>
      <p>
        <input type='text' size='60' name='address' value='1600 Amphitheatre Pky, Mountain View, CA' />
        <input type='button' value='Go!' />
      </p>
      <div id='map_canvas' style='width: 500px; height: 300px'></div>
    </form>		
		
		
		
		        <!-- gmapper -->
        <label for='$this->control_name'>$this->caption</label>
        <div>
          <div id='gmapper_infoPanel' class='control'>
            <input type='hidden' value='$this->gmapper_default_address' id='gmapper_address' >
            <button name='gmapper_but_reset' onclick='mapReset(); return false;'>Reset</button>
            <div id='gmapper_markerStatus'></div>
            <div class='hints'>
				Click and drag the marker, to fine tune the location
			</div>
            <i>Closest matching address:</i>
            <div id='gmapper_saddress'>2123</div>
            <input type='hidden' value='0' id='gmapper_lat' >
            <input type='hidden' value='0' id='gmapper_lng' >
          </div>
          <div id='gmapper_mapCanvas' class='control' style='width: ".$this->gmapper_map_width."px; height: ".$this->gmapper_map_height."px;'></div>
        </div>";
		return $s;
	}
	
	public function validate(&$v)
	{}
	
		public function genCodeJS()
	{
		$s="";
		
		return $s;
	}
}
	?>