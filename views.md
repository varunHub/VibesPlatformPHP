	@extends('layout.admin')
	
	
	@section('search')

	{{ Form::open(array('url' => 'admin/staff', 'class'=>'navbar-form pull-left')) }}
		<div class="form-group">
			<input type="text" class="form-control" placeholder="Search" name="search_key" id="search_key" value="{{ Input::get('search_key') }}" />
		</div>
		<button type="submit" class="btn btn-primary"><i class='icon-search'></i> Search</button>
	{{ Form::close() }}

	@stop
	
	
	@section('content')

	<!-- nspace module\directory\view\admin\list\parking -->
	<div class="span15">
	<h2>Staff  <small>/list /admin</small></h2>
		<a href="parking/create" class="btn btn-primary"><i class='icon-file-alt'></i> Create</a>
		<a href="parking/list" class="btn btn-primary"><i class='glyphicon glyphicon-list'></i> List</a>
	<hr/>
	
	<table class='table table-bordered table-striped table-condensed table-hover'>
		<thead>
			<tr>
				<th>ID</th>
				<th>[Key-field]</th>
			</tr>
		</thead>
		<tbody>
			@foreach($[object] as $r)
			<tr>
				<td>
					<span class="pull-right">
					@if ($r->locked)
						<i class="icon-lock"></i>
					@else
						<i class="icon-unlock icon-white"></i>
					@endif
					</span>
					{{ HTML::link('admin/staff/' . $r->id, $r->id, array('class'=>'btn btn-default btn-xs')) }}
				</td>
				<td>
					@if ($r->active==0) 
						<span class="text-muted">
					@endif
						{{ $r->[key_field] }}
					@if ($r->active==0) 
						</span>
					@endif
				</td>
				<td>{{ $r->[fields] }}</td>
				<td>{{ $r->active }}</td>
			</tr>
			@endforeach
		</tbody>
	</table> 
	
	{{ $[object]->links() }}
	
	</div>
	
	@stop