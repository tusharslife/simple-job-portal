@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    {{-- job description and duties --}}
    <div class="col-md-4">
    <div class="card">
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <p>Company Name: 
              <a
               href="{{ route('company.show', [$job['company_id'], $job->company]) }}">
                {{ $job->company->cname }}
              </a>
            </p>
            <p>Phone: <a 
               href="tel:{{ $job->company->phone }}">
               {{ $job->company->phone }}
              </a></p>
            <p>Website: 
               {{ $job->company->website }}
              </a></p>
              <form action="{{ route('company.show', [$job['company_id'], $job->company]) }}">
                <button type="submit" class="btn btn-primary btn-block mt-1">View Company Profile</button>
              </form>
              
          </ul>
        </div>
        
      </div>

    </div>
    {{-- job info details --}}
    <div class="col-md-8">
    <div class="card">
        <div class="card-body">
           
          <div class="card-title"><h2>Job Description</h2></div>
          <hr>
          <p>
            <h5>Position</h5>
            {{ $job->title }} ({{ $job->type }})</p>
          <p>
          <h5>Roles</h5>
          {{ $job->roles }}</p>
          <hr>    
          <p>
            <h5>Description</h5>
            {{ $job->description }}</p>
            <hr>
            <p>
            <h5>City/Area</h5>
            {{ $job->address }}</p>
            <hr>
            <p>
            <h5>Interviewing Address</h5>
            {{ $job->address }}</p>
            <hr>
            <p>Posted on: {{ $job->created_at->diffForHumans() }}</p>
            <p>Last date: {{ $job->last_date}}</p>               
        </div>
      </div>
      @if(Auth::user()->user_type =='seeker')
        @if(!$job->checkApplication())   
          <form  action="{{ route('apply', [$job->id]) }}" method="post">
					@csrf
         
					{{-- submit --}}
					<div class="form-group">
          <button 
            class="btn btn-success btn-block mt-1" 
            >Apply
          </button>
					</div>

					</form>
        @else
          <button 
            class="btn btn-success btn-block mt-1" 
            disabled>You already applied
          </button>
         @endif
        
       
         @endif

      @if(Session::has('message'))
        <div class="alert alert-info">
          {{ Session::get('message') }}
        </div>
      @endif

    </div>

  </div>
</div>
@endsection
