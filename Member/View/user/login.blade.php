@extends('layouts.user')
@section('content')

@if (isset($notice))
<div class="alert alert-{{$type}}">
	{{$notice}}
</div>
@endif

<div class="row">


	<div class="span6" >
		<div class="well">
		{{ render('user.form_login') }}
		</div>
	</div>
	<div class="span6" >
		<div class="well">
		{{ render('user.form_join') }}
		</div>
	</div>

</div>

@endsection