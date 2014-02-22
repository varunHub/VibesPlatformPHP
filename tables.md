# Table Structure #

This document is to maintain the DB scheme structure across the application. 

## System Fields ##

Each tables might have all/some/none of the following fields to store the system/process data.
In other word there are reserved fields which can not be used for other purpose.

- **online** - Mark the entity as visible for public
	- 1 - Visible to public
	- 0 - Not visible to public
- **active** - Mark the entity as live record, not a deleted one
	- 1 - This entry is live
	- 0 - This entry is deleted
- **locked** - Mark the entity as non editable by user and admin?
	- 1 - This entry is locked, not editable by any user (even by admin)
	- 0 - This entry is open for change 
- **publish_on**
	- The date this entry published 
- **created_at**
- **created_by**
- **updated_by**
- **updated_on**
- **revision**




### SQL Query Templates ###

**Add Table Column**

	ALTER TABLE `<prefix>_[actual_view_name_with_out_prefix]`
		ADD COLUMN `<prefix>_[actual_view_name_with_out_prefix]` [field_type] [NULL] AFTER `[after_column]` $$

**Change Table Column**

	ALTER TABLE `<prefix>_[actual_view_name_with_out_prefix]` 
		CHANGE COLUMN `[old_field_name]` `[new_field_name]` [field_type] [NOT NULL] $$



## Check List ##



1. Is key fields set to `Auto Increment`
1.   
