@extends('layout.master')
@section('content')
<div class="container" id="manage-users">
	<div class="col-md-8 mx-auto">
		<div class="panel panel-default">
			<div class="panel-heading">Create User</div>
			<div class="panel-body">
 				<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin_users/create_user') }}">
 					{!! csrf_field() !!}
 					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<div class="row">
							<label class="col-md-4 control-label">UserName</label>
	 						<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
									@if ($errors->has('name'))<span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>@endif
	 						</div>
						</div>
					</div> 
 					<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
						<div class="row">
							<label class="col-md-4 control-label">E-Mail address</label>
	 						<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
									@if ($errors->has('email'))<span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>@endif
	 						</div>
						</div>
					</div>
 					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<div class="row">
							<label class="col-md-4 control-label">Password</label>
	 						<div class="col-md-6">
								<input type="password" class="form-control" name="password">
									@if ($errors->has('password'))<span class="help-block"><strong>{{ $errors->first('password') }}</strong></span>@endif
	 						</div>
						</div>
					</div> 
 					<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
						<div class="row">
							<label class="col-md-4 control-label">Confirm Password</label>
	 						<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
									@if ($errors->has('password_confirmation'))<span class="help-block"><strong>{{ $errors->first('password_confirmation') }}</strong></span>@endif
	 						</div>
						</div>
					</div> 
 					<div class="form-group">
						<div class="row">
							<label class="col-md-4 control-label">Last name</label>
	 						<div class="col-md-6">
								<input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
	 						</div>
						</div>
					</div> 
 					<div class="form-group">
						<div class="row">
							<label class="col-md-4 control-label">First name</label>
	 						<div class="col-md-6">
								<input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
	 						</div>
						</div>
					</div> 
 					<div class="form-group">
						<div class="row">
							<label class="col-md-4 control-label">Active</label>
	 						<div class="col-md-6">
								<input id="active" name="active" type="checkbox" checked="checked">
	 						</div>
						</div>
					</div> 
 					<div class="form-group">
						<div class="row">
							<label class="col-md-4 control-label"></label>
	 						<div class="col-md-6">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-user"></i> Register
	                			</button>
	 						</div>
						</div>
					</div> 
				</form>
			</div>
			<a href="{{ url()->previous() }}" class="btn btn-default"><< Back</a>
		</div>
	</div>
</div>
@endsection

