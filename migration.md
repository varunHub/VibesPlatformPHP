## Templates for SQL object maintenance ##


File name templates for migration scripts

Table

	<Module> - XXXXXX - TN - <table> created to store <table description>.sql

	<Module> - XXXXXX - TA - <field> added to table <table> to store <field description>.sql

	<Module> - XXXXXX - TC - <field> type changed as <field type> on table <table>.sql

DB View

    <Module> - XXXXXX - VN - <view> created with <table names,>.sql

	<Module> - XXXXXX - VA - <field> added to view <view> to list <field description>.sql




**Create Table**

	delimiter $$

	CREATE TABLE IF NOT EXISTS <prefix>_<table_name>
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



**Create View - VIW** 

	delimiter $$
	
	DROP VIEW IF EXISTS <prefix>_<view_name> $$
	
	CREATE VIEW <prefix>_<view_name> AS
	    select 
	        a.id AS id,
	        a.grid_id AS grid_id,
	        a.row_record AS row_record,
	        a.grid_width AS grid_width,
	        a.image_url AS image_url,
	        a.link_url AS link_url,
	        a.title AS title,
	        a.descript AS descript,
	        a.locked AS locked
	    from
	        <prefix>_<view_name> a
	    where
	        ((a.active = 1))
	    order by a.display_order $$

**Create View - PUB** 

	delimiter $$
	
	DROP VIEW IF EXISTS <prefix>_<view_name> $$
	
	CREATE VIEW <prefix>_<view_name> AS
	    select 
	        a.id AS id,
	        a.grid_id AS grid_id,
	        a.row_record AS row_record,
	        a.grid_width AS grid_width,
	        a.image_url AS image_url,
	        a.link_url AS link_url,
	        a.title AS title,
	        a.descript AS descript,
	        a.locked AS locked
	    from
	        <prefix>_<view_name> a
	    where
	        ((a.online = 1)
	            and (a.active = 1))
	    order by a.display_order $$

