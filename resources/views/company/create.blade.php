@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">

		{{-- left column --}}	
		<div class="col-md-4">
		<div class="card">
				<div class="card-header">Company Profile</div>
				<div class="card-body">
					<p>Name: <strong>{{ Auth::user()->company->cname }}</strong></p>
					<p>Website: <a target="_blank" href="{{ Auth::user()->company->website }}">{{ Auth::user()->company->website }}</a></p>
					<p>Phone Number: <a href="tel:{{ Auth::user()->company->phone }}">{{ Auth::user()->company->phone }}</a></p>
					<p>
					<a href="company/{{Auth::user()->company->slug}}">View Full Company Profile</a>
					</p>								
				</div>
			</div>
		@if(!empty(Auth::user()->company->logo))
				<img src="{{ asset('uploads/logo') }}/{{ Auth::user()->company->logo }}" alt="" class="w-100  mt-2">
			@else
				<img src="{{ asset('avatar/logo.jpg') }}" alt="" class="w-100  mt-2">
			@endif
			{{-- logo form --}}
			<form action="{{ route('company.logo') }}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="card  mt-2">
					<div class="card-body">
						<input type="file" name="logo" class="form-control">
						<button class="btn btn-success mt-2 w-100" type="submit">Update</button>
					</div>
				</div>
			</form>			
		</div>

		{{-- center column --}}	
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">Update Your Company Profile</div>

				{{-- form --}}
				<form action="{{ route('company.store') }}" method="post">@csrf
					<div class="card-body">
					    {{-- slogan --}}
						<div class="form-group">
							<label for="slogan">Slogan</label>
							<input type="text"  maxlength="60" name="slogan" class="form-control"
								value="{{ Auth::user()->company->slogan }}">
						</div>

						{{-- website --}}
						<div class="form-group">
							<label for="website">Website</label>
							<input type="text" maxlength="80" name="website" class="form-control"
								value="{{ Auth::user()->company->website }}">
						</div>

						{{-- phone --}}
						<div class="form-group">
							<label for="phone">Phone</label>
							<input type="text" maxlength="12" name="phone" class="form-control"
								value="{{ Auth::user()->company->phone }}">
						</div>

						{{-- address input --}}
						<div class="form-group">
							<label for="address">Address</label>
							<input type="text"  maxlength="80" name="address" class="form-control"
								value="{{ Auth::user()->company->address }}">
						</div>						
			
						{{-- description --}}
						<div class="form-group">
							<label for="description">Description</label>
							<textarea maxlength="100" name="description" rows="4" cols="40" class="form-control">{{ Auth::user()->company->description }}</textarea>
						</div>

						{{-- submit --}}	
						<div class="form-group">
							<button class="btn btn-success w-100" type="submit">Update</button>
						</div>

						{{-- session message --}}
						@if(Session::has('message'))
							<div class="alert alert-success w-100 text-center">
								{{ Session::get('message') }}
							</div>
						@endif

					</div>
				</form>

			</div>
		</div>
	</div>
</div>
@endsection
