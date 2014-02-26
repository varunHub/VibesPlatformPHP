1. `p` - path
1. `i` - object index
1. `l` - local variable
1. `s` - status
 
Common Angular http delete api warpper 

	$scope.obj_del = function(p,i,l)
	{
		$http.delete('{{$app_url_api}}/'+p+'/'+i.id).success(function(data, status)
		{l.splice(l.indexOf(i), 1);});
		alert(p + ' Deleted');
	}



d

	$scope.del_[object]	= function(i){$scope.obj_del('business/[object]',i,scope.datai.[object]);};


sdf

		local_add_parking = function() {
		this.datai.parking.push({
			id : 0,
			business_id : 0,
			park_id : 0,
		});}

srth

	$scope.add_parking  	= local_add_parking;