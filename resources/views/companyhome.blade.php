@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
    
      <div class="col-md-10">
        <div class="card">
          <div class="card-header">Home - Posted Vacancies</div>

          <div class="card-body">
            <table class="table">
            <thead class="bg-light text-black">
          <th>Logo</th>
          <th>Title</th>
          <th>Status</th>
          <th>Posted On</th>
          <th>View</th>
          <th>Open</th>
          <th>Edit</th>      
      </thead>
              <tbody>
                {{-- jobs loop --}}
                @foreach($jobs as $job)
                  <tr>
                    @if(!empty(Auth::user()->company->logo))
                      <td>
                        <img 
                          src="{{ asset('uploads/logo') }}/{{ Auth::user()->company->logo }}" 
                          width="60" height="60">
                      </td>
                    @else
                      <td>
                        <img src="{{ asset('avatar/logo.png') }}" alt="" width="60" height="60">
                      </td>
                    @endif
                    <td>
                      <span class="text-primary"></span> 
                      {{ $job->title }} <strong>({{ $job->type }})</strong>    
                    </td>
                    @if($job->status =='1')
                      <td>Live</td>
                    @else
                      <td>Draft</td>
                    @endif
                    <td>
                      Date: {{ $job->created_at->diffForHumans() }}
                    </td>
                    </td>
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
            <a 
                        href="{{ route('job.show', [$job->id, $job->slug]) }}">
                        <button class="btn btn-success btn-sm">Open Job</button>
                      </a>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div></td>
                    <td>
                      {{-- link to each individual job --}}
                      <a 
                        href="{{ route('job.show', [$job->id, $job->slug]) }}">
                        <button class="btn btn-success btn-sm">Open Job</button>
                      </a>
                    </td>
                    <td>
                      <a href="{{ route('job.edit', [$job->id]) }}">
                        <button class="btn btn-dark btn-sm">Edit Job</button>
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
