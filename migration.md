# Templates for SQL object maintenance #

File name templates for migration scripts

SQL Table Object prefix

1. `bas` - *TABLE* : Base Table prefix
	1. The table which hold the main data for a given module
1. `sys` - *TABLE* : System table prefix
	1. The table which hold the supporting data for a given module
1. `viw` - *VIEW*  : Global View prefix
	1. The view for every where use
1. `pub` - *VIEW*  : Public view prefix
	1. The view to use only in public area 
1. `mem` - *VIEW*  : Member view prefix
	1. The view to use only in member area

 

## File and Script templates for SQL migration ##

**Create Table**

*File name template*

	<Module> - XXXXXX - TN - <table> created to store <table description>.sql

*Script template* 

	delimiter $$

	CREATE TABLE IF NOT EXISTS <prefix>_<actual_table_name_with_out_prefix>
	(
		id 			bigint(20) NOT NULL AUTO_INCREMENT,

		string_field	varchar(45) DEFAULT NULL,
		date_field		varchar(45) DEFAULT NULL,
		int_field	 	varchar(45) DEFAULT NULL,

		//----------------------------------------- Status Fields
		active 		tinyint(4) DEFAULT '1',
		online 		tinyint(4) DEFAULT '1',
		locked 		tinyint(4) DEFAULT '0',
		//----------------------------------------- tracking Fields
		created_by 	int(11) DEFAULT NULL,
		created_at 	datetime DEFAULT NULL,
		updated_by 	int(11) DEFAULT NULL,
		updated_at 	datetime DEFAULT NULL,

		admin_by	int(11) DEFAULT NULL,
  		admin_at	int(11) DEFAULT NULL,
		//----------------------------------------- Revision Fields
  		revision	bigint(20) DEFAULT NULL,

		PRIMARY KEY (id)
	)
	ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1 $$


**Add Table Column**

*File name template*

	<Module> - XXXXXX - TA - <field> added to table <table> to store <field description>.sql


*Script template* 

	ALTER TABLE <prefix>_<actual_table_name_with_out_prefix>
		ADD COLUMN <prefix>_<actual_view_name_with_out_prefix> [field_type] [NULL] AFTER `[after_column]` $$

**Change Table Column**

*File name template*

	<Module> - XXXXXX - TC - <field> type changed as <field type> on table <table>.sql

*Script template*

	ALTER TABLE <prefix>_<actual_table_name_with_out_prefix> 
		CHANGE COLUMN `[old_field_name]` `[new_field_name]` [field_type] [NOT NULL] $$


## DB View ##

**Create View - MEM** 

DB View for only internally displayable data

*File name template*

	<Module> - XXXXXX - TN - <table> created to store <table description>.sql

*Script template*

	delimiter $$
	
	DROP VIEW IF EXISTS <prefix>_<actual_view_name_with_out_prefix> $$
	
	CREATE VIEW <prefix>_<actual_view_name_with_out_prefix> AS
	    SELECT 
	        a.id AS id,
	        a.grid_id AS grid_id,
	        a.row_record AS row_record,
	        a.grid_width AS grid_width,
	        a.image_url AS image_url,
	        a.link_url AS link_url,
	        a.title AS title,
	        a.descript AS descript,
	        a.locked AS locked
	    FROM
	        <prefix>_<view_name> a
	    WHERE
	        ((a.active = 1))
	    ORDER BY a.display_order $$

**Create View - PUB**
 
DB View for publicly displayable data

*File name template*

    <Module> - XXXXXX - VM - <view> created with <table names,>.sql


*Script template*
  
	delimiter $$
	
	DROP VIEW IF EXISTS <prefix>_<view_name> $$
	
	CREATE VIEW <prefix>_<view_name> AS
	    SELECT 
	        a.id AS id,
	        a.grid_id AS grid_id,
	        a.row_record AS row_record,
	        a.grid_width AS grid_width,
	        a.image_url AS image_url,
	        a.link_url AS link_url,
	        a.title AS title,
	        a.descript AS descript,
	        a.locked AS locked
	    FROM
	        <prefix>_<view_name> a
	    WHERE
	        ((a.online = 1)
	            and (a.active = 1))
	    ORDER BY a.display_order $$



Updated on :
22/02/2014 12:29:41 PM 