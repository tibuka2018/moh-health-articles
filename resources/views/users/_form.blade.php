<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Name</label>
	<div class="col-sm-10">
		<input type="text" name="name" id="name" value="{{ isset($user->name) ? $user->name : old('name') }}" class="form-control">
	</div>
</div>
<div class="form-group">
	<label for="email" class="col-sm-2 control-label">Email</label>
	<div class="col-sm-10">
		<input type="text" name="email" id="email" value="{{ isset($user->email) ? $user->email : old('email') }}" class="form-control">
	</div>
</div>
<label for="email" class="col-sm-2 control-label">User Role</label>
<div class="col-sm-10">
	<div class="radio">
		<label>
			<input type="radio" name="is_admin" id="inputIs_admin" value="1" 
			@if(isset($user->is_admin))
				@if($user->is_admin)
					checked="checked" 
				@endif
			@endif
			>
			Admin	
		</label>
	</div>	
	<div class="radio">
		<label>
			<input type="radio" name="is_admin" id="inputIs_admin" value="0" 
			@if(isset($user->is_admin))
				@if( ! $user->is_admin)
					checked="checked" 
				@endif
			@endif
			>
			Normal user
		</label>
	</div>	
</div>
