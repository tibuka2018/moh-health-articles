@extends('layouts.app')

@section('title', 'Users')

@section('content')

	{{-- banner --}}
	<div class="container">
		@include('partials.banner')
	</div>

    {{-- Navbar --}}
    @include('partials.navbar')

    <div class="container main">
    	<div class="row">
    		<div class="col-sm-12">
    			<h1>Manage users</h1>
    			<div class="panel panel-primary">
    				<div class="panel-heading">
    					<h3 class="panel-title">Users</h3>
    				</div>
    				<div class="panel-body">
    					@if($users->count() > 0)
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>SN</th>
											<th>Name</th>
											<th>Email</th>
											<th>Admin</th>
											<th>Joined</th>
											<th>Last Login</th>
											<th colspan="2" class="text-center"><i class="fa fa-cog"></i></th>
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; ?>
										@foreach($users as $user)
											<tr>
												<td>{{ $i }}</td>
												<td>{{ $user->name }}</td>
												<td>{{ $user->email }}</td>
												<td>
													@if($user->is_admin)
														Yes
													@else
														No
													@endif
												</td>
												<td>{{ $user->created_at->diffForHumans() }}</td>
												<td>{{ $user->updated_at->diffForHumans() }}</td>
												<td><a href="{{ url('users/' . $user->id . '/edit') }}"><i class="fa fa-edit"></i></a></td>
												{{-- <td><a href="#"><i class="fa fa-trash"></i></a></td> --}}
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
    					@else
							<h1 class="text-center">Empty</h1>
    					@endif
    				</div>
    				<div class="panel-footer">
    					<a href="{{ url('users/create') }}" class="btn btn-primary">Add</a>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>

    @include('partials.footer')	

@endsection
