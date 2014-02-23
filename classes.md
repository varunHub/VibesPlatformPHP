# Class Templates #

This document is created with the interest of making the development process based on templates

## Controller Class Template

	<?php namespace module\[module];
	//module\[module]\[objectname]Cont
	
	use Controller;
	use View;
	use platform\core as Core;
	
	use module\[module]\modelbase 		as mb; //t:tbl
	use module\[module]\modelsystem 	as ms; //t:sys
	use module\[module]\modelmember		as mm; //v:mem
	use module\[module]\modelpublic 	as mp; //v:pub
	use module\[module]\modelview 		as mv; //v:viw

	class [objectname]Cont extends Core\coreController
	{
		protected function setup()
		{
			$this->json_model_key	= '[objectname]';
			$this->model_title		= '<Model title>';
			$this->model_name		= 'module\[module]\[sub_model]\[objectname]';
			$this->search_field 	= 'id';

			$this->view_list		= 'public.list.public_list_[objectname]';
			$this->view_show		= 'public.show.public_show_[objectname]';

			$this->view_user_list	= 'member.list.member_list_[objectname]';
			$this->view_user_show	= 'member.show.member_show_[objectname]';
			$this->view_user_edit	= 'member.edit.member_edit_[objectname]';

			$this->view_admin_list	= 'admins.list.admins_list_[objectname]';
			$this->view_admin_show	= 'admins.show.admins_show_[objectname]';
			$this->view_admin_edit	= 'admins.edit.admins_edit_[objectname]';
		}

		/* Custom route handlers
			- Add the handler route to route.php
			- function should be public
			- name function as follows <http-method>_<user_scope>_<name_of_use>
				- public function post_user_recheck() {}
			-
		*/
		 
	}



## PUB - Class Template ##


## TAB Class Template ##

	<?php namespace module\[module];
	//module\[module]\[objectname]

	use platform\core as Core;
	use module\[module] as Base;
	
	class [objectname] extends Core\coreFullModel implements Core\ICoreFullModel
	{
		protected $primaryKey 	= '[id]';
		protected $table 		= '[dir_tbl_biz_trans_station]';
	
		public static $rules = array(
				'id'			=> 'required',
				[otherfields]	=> 'required',
	    	);
	    
		public function make()
		{
			$this->id			=	0;
			$this->[otherfields]	=	'';
		}

	    public function assignTo($s)
	    {
			$this->station_id=$s['station_id'];
			$this->info=$s['info'];
	
	    }

		// methods to override when needed
		
	}


## VIW Class Template ##

**Template**

    <?php namespace [name_space];
    //[searchable_name_space]
    
    use platform\core as Core;
    
    class [qualified_viw_name] extends Core\coreViewModel
    {
    	protected $primaryKey = '[primary_key]';
    	protected $table = '[actual_view_name_with_out_prefix]';
    }


**Sample**

    <?php namespace module\directory\modelview;
    //module\directory\modelview\viwBizPaymode
    
    use platform\core as Core;
    
    class viwBizPaymode extends Core\coreViewModel
    {
    	protected $primaryKey = 'business_id';
    	protected $table = 'dir_viw_biz_paymode';
    }







Last update : 
22/02/2014 12:22:56 PM 
 
