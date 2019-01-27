@extends('layout.master')
@section('content')
<div class="container showdetail" id="manage-user">
		<div class="col-md-8 mx-auto">
			<div class="card">
			<div class="card-body">
				<div class="card-title">Show User: {{$user->name}}</div>
					<div class="card-text">
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
					<a class="card-link" href="{{ url()->previous() }}" title="Go back"><< Back</a> 
					<a class="card-link" href="{{url('admin_users') }}" title="Show all users">Show all</a>
					<a class="card-link" href="#" data-toggle="modal" title="Delete user" data-href="{{url('admin_users') }}/delete/{{$user->id}}" data-target="#confirm-delete">Delete</a>

				</div>
			</div>
		</div>
</div>

<!-- Modal -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="modalLabel">Confirm delete</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
                    <p>You are about to delete one track, this procedure is irreversible.</p>
                    <p>Do you want to proceed?</p>
                    <p class="debug-url"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-ok">Delete</a>
                </div>
            </div>
        </div>
    </div>

<script src="{{ url('/js/custom/custom_bottom_user.js') }}"></script>    
@endsection

