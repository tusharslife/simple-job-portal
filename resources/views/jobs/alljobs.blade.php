@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  <h4 class="mb-2 text-dark">Browse All Jobs</h4>
<table class="table table-bordered table-hover">
      <thead class="bg-dark text-white">
        <tr>
          <th>Title</th>
          <th>Hours</th>
          <th>City/Area</th>
          <th>Posted</th>
          <th>Last Date</th>
          <th>Job</th>
          <th>Profile</th>  
        </tr>
      </thead>
      <tbody>
        {{-- jobs loop --}}
        @foreach($jobs as $job)
          <tr>
          <td>{{ $job->title }}</td>
            <td>{{ $job->type }}</td>
            <td> {{ $job->address }}</td>
            <td>{{ $job->created_at->diffForHumans()}}</td>
            <td> {{ $job->last_date}}</td>
              {{--Applied Condition--}}
             @if(!$job->checkApplication())   

             <td style="color:Red;">Not Applied</td>

              @else
              <td style="color:Green;">Applied</td>
              @endif

            <td>
              {{-- link to each individual job --}}
              <a href="{{ route('job.show', [$job->id, $job->slug]) }}">
                <button class="btn btn-primary">View</button></td>
              </a>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="mx-auto">
      {{ $jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links() }}
    </div>
  </div>
</div>


  </div>
@endsection
