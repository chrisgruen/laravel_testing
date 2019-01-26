@extends('layout.master')
@section('content')
<div class="container showdetail" id="manage-user">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="panel panel-default">
				<div class="panel-heading">Show User: {{$user->name}}</div>
				<table class="table table-striped table-bordered detail-view">
					<tr>
						<th>User_id</th>
						<td>{{$user->id}}</td>
					</tr>
					<tr>
						<th>User nickname</th>
						<td>{{$user->name}}</td>
					</tr>
					<tr>
						<th>First name</th>
						<td>{{$user->first_name}}</td>
					</tr>
					<tr>
						<th>Last name</th>
						<td>{{$user->last_name}}</td>
					</tr>
					<tr>
						<th>Active</th>
						<td>@if($user->active == 1)Yes @else No @endif</td>
					</tr>
				</table>
			</div>
			<a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
		</div>
 	</div>
</div>
@endsection

