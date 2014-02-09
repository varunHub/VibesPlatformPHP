@extends('layout.admin_base_bs3')

@section('content')


@foreach($backup_names as $f)
	
	
<a href="">{{$f}}</a>
<form action="../restore.now/{{$f}}" method="get">
<button type="submit" class="btn">Restore Now</button>
</form>



@endforeach


ffffffffffffffffff



@stop
