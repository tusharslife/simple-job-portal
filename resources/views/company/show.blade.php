@extends('layouts.app')

@section('content')
<div class="container">
<h3 class="mb-2 text-dark">Company Profile</h3>
  <div class="col-md-12">

    {{-- company profile --}}
    <div class="company-profile">
      <div class="company-desc mt-4">
        <div class="row">
          <div class="col-md-4">
            @if(!empty($company->logo))
              <img src="{{ asset('uploads/logo') }}/{{ $company->logo }}" alt="" class="w-100 img-thumbnail">
            @else
              <img src="{{ asset('avatar/logo.png') }}" alt="" class="w-100 img-thumbnail">
            @endif
          </div>
          <div class="col-md-8">
            <h1>{{ $company->cname }}</h1>
            <h6><em>{{ $company->slogan }}</em></h6>
            <br>
            <p>Company Phone Number: <a href="tel:{{ $company->phone }}">{{ $company->phone }}</a></p>
            <p>Company Address: {{ $company->address }}
            </p>
            <p>Company Website: {{  $company->website }}</a></p>
            <p class="my-4">About Company: {{ $company->description }}
            </p>
            <a href="{{ route('company.view') }}">
            @if(Auth::user()->user_type =='employer')
            <button class="btn btn-primary">Edit Company Profile</button></td>
           @endif
        


     
              </a>
          </div>
        </div>
      </div>
    </div>	
<br>
    {{-- jobs posted by a company --}}
    <table class="table">
      <thead>
        <th>Title</th>
        <th>Open Job</th>
        <th>Last Date</th>
        <th>Pop-up</th>
      </thead>	
      <tbody>
        {{-- jobs loop --}}
        @foreach($company->jobs as $job)
          <tr>
            <td><span class="text-primary"></span> {{ $job->title }}
              <br>{{ $job->type }}
            </td>
            <td>
              {{-- link to each individual job --}}
              <a href="{{ route('job.show', [$job->id, $job->slug]) }}">
                <button class="btn btn-success btn-sm">Open Job</button></td>
              </a>

                               <td>{{ \Carbon\Carbon::parse($job->last_date)->format('d-M-Y')}}</td>
 <!-- Modal -->
 <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#hi{{ $job->id }}hi">View Job</button>
<div id="hi{{ $job->id }}hi" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">{{ $job->title }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <p>Last date: {{ \Carbon\Carbon::parse($job->last_date)->format('d-M-Y')}}</p> 
      <p><h5>Type</h5>
      {{ $job->type }}</p>
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
            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div></td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
</div>
@endsection
