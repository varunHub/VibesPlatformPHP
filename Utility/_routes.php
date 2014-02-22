<?php


/*---------------- system ---------------------*/
// DB CARE
Route::get("system/Utility/list/backup",  		"platform\Utility\UtilityCont@get_list_backup");
Route::get("system/Utility/show/backup/{id}",  	"platform\Utility\UtilityCont@get_show_backup");

Route::get("system/Utility/backup.now",  "platform\Utility\UtilityCont@post_backup_now");
Route::get("system/Utility/restore.now/{id}", "platform\Utility\UtilityCont@post_restore_now");


