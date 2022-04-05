@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">

		{{-- left column --}}	
		<div class="col-md-4">
		<div class="card">	
			<div class="card-header">Your Profile</div>
			
				<div class="card-body">
					<p>Name: {{ Auth::user()->name }}</p>
					<p>Phone: {{ Auth::user()->profile->phone_number }}</p>
					<p>Email: {{ Auth::user()->email }}</p>
					<a href="{{ route('profile.view') }}">{{ __('View Profile') }}</a>	
				</div>
			</div>
		@if(empty(Auth::user()->profile->avatar))
				<img src="{{ asset('avatar/logo.jpg') }}" alt="" class="w-100  mt-2 ">
			@else
				<img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile->avatar }}" alt="" class="w-100  mt-2 ">
			@endif
			{{-- avatar form --}}
			<form action="{{ route('avatar') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="card  mt-2 ">
					<div class="card-header">
						<div class="card-body">
							<input type="file" name="avatar" class="form-control">
							<button class="btn btn-primary mt-2 w-100" type="submit">Update Profile Photo</button>
							@if($errors->has('avatar'))
								<div class="alert alert-danger mt-2">
									{{ $errors->first('avatar') }}
								</div>
						@elseif(Session::has('avatar_message'))
								<div class="alert alert-success">
									{{ Session::get('avatar_message') }}
								</div>
							@endif
						</div>
					</div>
				</div>
			</form>
			
		</div>

		{{-- center column --}}	
		<div class="col-md-8">
		{{-- session message --}}
						@if(Session::has('profile_message'))
							<div class="alert alert-success w-100 text-center">
								{{ Session::get('profile_message') }}
							</div>
						@endif
			<div class="card">
			
				<div class="card-header">Update You Profile</div>

				{{-- form --}}
				<form action="{{ route('profile.create') }}" method="post">@csrf
					<div class="card-body">
						{{-- address input --}}
						<div class="form-group">
							@if($errors->has('address'))
								<p class="text-danger">{{ $errors->first('address') }}</p>
							@else
								<label for="address">Address</label>
							@endif
							<input maxlength="80"type="text" name="address" class="form-control" value="{{ Auth::user()->profile->address }}">
						</div>
						{{-- phone number input --}}
						<div class="form-group">
							@if($errors->has('phone_number'))
							<p class="text-danger">{{ $errors->first('phone_number') }}</p>
							@else
							<label for="phone_number">Phone Number</label>
							@endif
							<input maxlength="13" type="text" name="phone_number" class="form-control" value="{{ Auth::user()->profile->phone_number }}">
						</div>
						{{-- experience input --}}
						<div class="form-group">
							@if($errors->has('experience'))
							<p class="text-danger">{{ $errors->first('experience') }}</p>
							@else
							<label for="experience">Experience</label>
							@endif
							<textarea maxlength="180" name="experience" class="form-control">{{ Auth::user()->profile->experience }}</textarea>
						</div>
						{{-- bio input --}}
						<div class="form-group">
							@if($errors->has('bio'))
							<p class="text-danger">{{ $errors->first('bio') }}</p>
							@else
							<label for="bio">Bio</label>
							@endif
							<textarea maxlength="180" name="bio" class="form-control">{{ Auth::user()->profile->bio }}</textarea>
						</div>
						{{-- submit --}}	
						<div class="form-group">
							<button class="btn btn-primary w-100" type="submit">Update Info</button>
						</div>
					</div>
				</form>

			</div>
		</div>

		{{-- right column --}}
		<div class="col-md-4">

			

			

		</div>

	</div>
</div>
@endsection
