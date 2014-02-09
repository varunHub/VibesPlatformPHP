<?php namespace platform\Utility;

use platform\core as Core;
use Config;
use View;
use platform\Utility as ut;

class DBCareCont extends Core\platformController
{
	protected $backup;

	function __construct()
	{
		$this->backup = new ut\dbHandler();
	}

	function get_list_backup()
	{


		$names = $this->backup->GetbackupNames();

		return View::make('admin.list.list_backup')
			->with('backup_names', 	$names)
			;

	}

	function get_show_backup($name)
	{
		return View::make('admin.list.list_backup')
			->with('backup_name', 	$name)
			;
	}

	function godaddy_backup()
	{
		$this->backup->godaddy_backup();
	}

	function godaddy_restore()
	{
		$mysqlImportFilename = 'file-to-restore.sql';
		$this->backup->godaddy_restore();
		
	}

	function post_backup_now()
	{
		$result = $this->backup->getDataSchemaBackup();
		DD($result);
		/*
		return View::make('admin.show.backup_status')
			-with('result', $result)
			;
			*/
	}	

	function post_restore_now($bname)
	{
		//echo $bname;
		$this->backup->prepairForRestore($bname,'testdb');
		return $this->backup->RestoreDataSchema();
	}



	function test()
	{
//		$this->backup->prepairForBackup();
		$this->backup->DBExportLinux();
		echo "dddd";
	}

}   
