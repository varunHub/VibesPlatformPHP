ModuleName
	Controller
	Model
	View




	[Module]
		|
		|__Controller
		|
		|__ModelBase
		|
		|__ModelSystem
		|
		|__ModelView
		|
		|__View
			|
			|__admins
			|	|__edit
			|	|__show
			|	|__list
			|	|__home
			|
			|__member
			|	|__edit
			|	|__show
			|	|__list
			|	|__home
			|
			|__public
			|	|__edit
			|	|__show
			|	|__list
			|	|__home
			|
			|___layout
			|
			|___emails



**Note**
ModelBase
ModelSystem
ModelView

These can be be combined as a single folder named **Model**, depends on the simplicity of the module or
based on number of *Models* used in the *module*

If module/objects/components need not to respond to a perticular scope we then no need to have the related folder structure.
ex: Setting module require only setting/view/admin



View
	edit
		
	show
	list

View
	public
		
	admin
	user



Prefox
<module>
sys
viw
pub
