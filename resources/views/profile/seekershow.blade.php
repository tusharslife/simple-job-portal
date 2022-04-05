@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row">

		{{-- left column --}}	
		<div class="col-md-4">
		@if(empty(Auth::user()->profile->avatar))
				<img src="{{ asset('avatar/logo.png') }}" alt="" class="img-thumbnail">
			@else
				<img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile->avatar }}" alt="" class="img-thumbnail">
			@endif
		</div>

		{{-- center column --}}	
		<div class="col-md-8">
		<div class="card mt-2 ">	
			<div class="card-header">Job Seeker Full Profile</div>
				<div class="card-body">
					<p>Name: {{ Auth::user()->name }}</p>
					<p>Gender: {{ Auth::user()->profile->gender }}</p>
					<p>Date of Birth: {{ Auth::user()->profile->dob }}</p>
					<p>Phone: {{ Auth::user()->profile->phone_number }}</p>
					<p>Email: {{ Auth::user()->email }}</p>
					<p>Address: {{ Auth::user()->profile->address }}</p>
					<p>Experience: {{ Auth::user()->profile->experience }}</p>
					<p>Bio: {{ Auth::user()->profile->bio }}</p>				
					<p>Member Since: {{ Auth::user()->created_at->format('d-m-Y') }}</p>	
				</div>
			</div>
		</div>

		{{-- right column --}}
		<div class="col-md-4">

			

			

		</div>

	</div>
</div>
@endsection
