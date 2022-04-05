@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				@if(Session::has('message'))
					<div class="alert alert-success text-center text-uppercase">
						{{ Session::get('message') }}
					</div>
				@endif
				<div 
					class="card-header text-center bg-primary text-white text-uppercase">
					Update a job
				</div>
				<div class="card-body">

					<form action="{{ route('job.update', [$job->id]) }}" method="post">
					@csrf

					{{-- status --}}
					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" class="form-control">
							<option value="1"{{ $job->status=='1'?'selected':'' }}>Live</option>	
							<option value="0"{{ $job->status=='0'?'selected':'' }}>Draft</option>	
						</select>
					</div>

					{{-- last date --}}
					<div class="form-group">
						@if($errors->has('last_date'))
							<div class="text-danger">
								<strong>{{ $errors->first('last_date') }}</strong>
							</div>
						@else
						<label for="last_date">Last Date</label>
						@endif
						<input 
							type="date" 
							name="last_date" 
							class="form-control" 
							value="{{ $job->last_date }}">
					</div>

					{{-- title --}}
					<div class="form-group">
						@if($errors->has('title'))
							<span class="text-danger">
								<strong>{{ $errors->first('title') }}</strong>
							</span>
						@else
							<label for="title">Title</label>
						@endif
						<input type="text" 
						maxlength="30"
							name="title" 
							class="form-control" 
							value="{{ $job->title }}">
					</div>

					{{-- position --}}
					<div class="form-group">
						@if($errors->has('position'))
							<div class="text-danger">
								<strong>{{ $errors->first('position') }}</strong>
							</div>
						@else
						<label for="position">Position</label>
						@endif
						<input type="text"
						maxlength="30"
							name="position" 
							class="form-control" 
							value="{{ $job->position }}">
					</div>

					{{-- roles --}}
					<div class="form-group">
						@if($errors->has('roles'))
							<div class="text-danger">
								<strong>{{ $errors->first('roles') }}</strong>
							</div>
						@else
						<label for="roles">Roles</label>
						@endif
						<textarea  maxlength="180" name="position" rows="3" cols="40" class="form-control">{{ $job->roles }}</textarea>
					</div>

					{{-- type --}}
					<div class="form-group">
						<label for="type">Type</label>
						<select name="type" class="form-control">
							<option 
								value="Full Time"{{$job->type=='Full Time'?'selected':''}}>Full Time
							</option>	
							<option 
								value="Part Time"{{$job->type=='Part Time'?'selected':''}}>Part Time
							</option>	
							<option 
								value="Internship"{{$job->type=='Internship'?'selected':''}}>Internship
							</option>
							<option 
								value="Contract"{{$job->type=='Contract'?'selected':''}}>Contract
							</option>		
						</select>
					</div>

					{{-- description --}}	
					<div class="form-group">
						@if($errors->has('description'))
							<div class="text-danger">
								<strong>{{ $errors->first('description') }}</strong>
							</div>
						@else
						<label for="title">Job Description</label>
						@endif
						<textarea  maxlength="180" name="description" rows="3" cols="40" class="form-control">{{ $job->description }}</textarea>
					</div>
								
					{{-- address --}}
					<div class="form-group">
						@if($errors->has('address'))
							<div class="text-danger">
								<strong>{{ $errors->first('address') }}</strong>
							</div>
						@else
						<label for="address">Interviewing Full Address</label>
						@endif
						<textarea  maxlength="180" name="address" rows="3" cols="40" class="form-control">{{ $job->address }}</textarea>
					</div>		

					{{-- submit --}}
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg w-100">Submit</button>
					</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
