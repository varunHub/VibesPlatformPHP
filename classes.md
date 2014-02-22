# Class Templates #

This document is created with the interest of making the development process based on templates

## Controller Class Template

	<?php namespace module\[module];
	//module\[module]\sysCategoryCont
	
	use Controller;
	use View;
	use platform\core as Core;
	
	class sysCategoryCont extends Core\coreController
	{
		protected function setup()
		{
			$this->json_model_key	= "sysCategory";
			$this->model_title		= "Category";
			$this->model_name		= "module\[module]\[sub_model]\sysCategory";
			$this->search_field 	= "category_main";

			$this->view_list		= 'public.list.list_sys_[object]';
			$this->view_show		= 'public.show.show_sys_[object]';

			$this->view_user_list	= 'user.list.list_sys_[object]';
			$this->view_user_show	= 'user.edit.show_sys_[object]';
			$this->view_user_edit	= 'user.edit.edit_sys_[object]';

			$this->view_admin_list	= 'admin.list.list_sys_[object]';
			$this->view_admin_show	= 'admin.list.show_sys_[object]';
			$this->view_admin_edit	= 'admin.edit.edit_sys_[object]';
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

	<?php namespace module\[directory];
	//module\[module]\[bizTransportStation]

	use platform\core as Core;
	use module\[module] as Base;
	
	class [bizTransportStation] extends Core\coreFullModel implements Core\ICoreFullModel
	{
		protected $primaryKey 	= '[id]';
		protected $table 		= "[dir_tbl_biz_trans_station]";
	
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






15/02/2014 4:57:36 PM 
 