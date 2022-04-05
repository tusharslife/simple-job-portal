@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
  <h4 class="mb-2 text-dark">Home - Recent Jobs</h4>
    {{-- table of jobs --}}
    <table class="table table-bordered table-hover ">
      <thead class="bg-dark text-white">
          <th>Title</th>
          <th>Hours</th>
          <th>City/Area</th>
          <th>Posted</th>
          <th>Last Date</th>
          <th>Job</th>
          <th>Profile</th>         
      </thead>
      <tbody>
        {{-- jobs loop --}}
        @foreach($jobs as $job)
          <tr>
            <td>{{ $job->title }}</td>
            <td>{{ $job->type }}</td>
            <td> {{ $job->address }}</td>
            <td>{{ $job->created_at->diffForHumans()}}</td>
            <td>{{ \Carbon\Carbon::parse($job->last_date)->format('d-M-Y')}}</td>
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
  </div>
  <!-- <div class="text-center">
  <a href="{{ route('alljobs') }}" class="btn btn-primary">Browse all jobs</a>
  </div> -->
</div>
  </div>
  </div>
@endsection
