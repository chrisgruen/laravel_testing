@extends('layout.master')
@section('content')
<div class="container" id="manage-user">
    <div class="row">
   		<table class="table table-striped table-bordered">
   			<form class="form-horizontal" method="POST" action="{{ url('/admin_users') }}">
   			{!! csrf_field() !!}
   			<tr>
   				<th>Nick name <a href="{{ url('/admin_users/create') }}" title="Add user"><i class="fa fa-plus-square" aria-hidden="true"></i></a></th>
   				<th>Last name</th>
   				<th>First name</th>
   				<th>Email</th>
   				<th>Created time</th>
   				<th>	
   					<select class="form-control" onchange="this.form.submit()" name="activated">
				   		 <option value="99" @if($request->activated == 99) selected @endif>-- All --</option>
                         <option value="1" @if($request->activated == 1) selected @endif>Activated</option>
                         <option value="0" @if($request->activated == 0) selected @endif>Deactivated</option>
					 </select>
				</th>
   			</tr>
			<tr>
				<th><input type="text" class="form-control" name="nick_name" value="{{$request->nick_name}}"></th>
				<th><input type="text" class="form-control" name="last_name" value="{{$request->last_name}}"></th>
				<th><input type="text" class="form-control" name="first_name" value="{{$request->first_name}}"></th>
				<th><input type="text" class="form-control" name="email" value="{{$request->email}}"></th>
				<th>
					<div id="start_date">Start: <input type='text' class="form-control" id='user_datetimepicker_start' name="user_start_date" value="{{$request->user_start_date}}"></div>
					<div id="end_date">End: <input type="text" class="form-control" id='user_datetimepicker_end' name="user_end_date" value="{{$request->user_end_date}}"></div>
				</th>
				<th>
					<button type="submit" class="btn btn-primary">
						<input type="hidden" name="search" value=1><i class="fa fa-btn"></i>Filter
					</button>
				</th>
			</tr>
   			</form>
   			@foreach($users as $user)
    		<tr>
   				<td>{{$user->name}}</td>
   				<td>{{$user->last_name}}</td>
   				<td>{{$user->first_name}}</td>
   				<td>{{$user->email}}</td>
   				<td>{{$user->created_at}}</td>
   				<td>
   					<a title="Show" href="{{url('admin_users') }}/show/{{$user->id }}">
   						<i class="fa fa-eye" aria-hidden="true"></i>
					</a>
					<a  title="Edit" href="{{url('admin_users') }}/edit/{{$user->id }}">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>
					@if($user->active == 1)
						<a href="#">
							<i class="fa fa-check-circle user-activ" aria-hidden="true" id="{{$user->id}}"></i>
						</a>
					@else 
						<a href="#">
							<i class="fa fa-minus-circle user-notactiv" aria-hidden="true" id="{{$user->id}}"></i>
						</a>
					@endif					
   				</td>
   			</tr>  	
   			@endforeach			
   		</table>
    </div>
    {{ $users->appends(
    	['vtiger_org' => $request->vtiger_org, 
    	 'nick_name' => $request->nick_name, 
    	 'last_name' => $request->last_name, 
    	 'first_name' => $request->first_name, 
    	 'email' => $request->email,
    	 ]
    	)->links() 
    }}
</div>

<div id="modal-user"></div>   
<script src="{{ url('/js/custom/custom_bottom_user.js') }}"></script>		
@endsection
