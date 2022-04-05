@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col">
        <div class="card">
        <div class="card-header">My Applicants</div>
          <table class="table">
            @foreach($applicants as $applicant)
                @foreach($applicant->users as $user)
                  <tbody>
                    <tr>
                      <th>{{ $user->name }}</th>
                      <td>{{ $user->profile->gender }}</td>
                      <td> <a 
                  href="{{ route('job.show', [$applicant->id, $applicant->slug]) }}">
                  {{ $applicant->title }}
                </a></td>
                      <td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#{{ $user->profile->gender }}{{ $user->id }}{{ $user->profile->gender }}">View Profile</button>

<!-- Modal -->
<div id="{{ $user->profile->gender }}{{ $user->id }}{{ $user->profile->gender }}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title"> {{ $applicant->title }}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
          <p>Name: {{ $user->name }}</p>
					<p>Gender: {{ $user->profile->gender }}</p>
					<p>Date of Birth: {{ $user->profile->dob }}</p>
					<p>Phone: {{ $user->profile->phone_number }}</p>
					<p>Email: {{ $user->email }}</p>
					<p>Address: {{ $user->profile->address }}</p>
					<p>Experience: {{ $user->profile->experience }}</p>
					<p>Bio: {{ $user->profile->bio }}</p>				
					<p>Member Since: {{ $user->created_at->format('d-m-Y') }}</p>
      </div>
      <div class="modal-footer">
      <a href="mailto:{{ $user->email }}">
                      <button class="btn btn-primary btn-sm">Send Mail</button></a>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div></td>
                      <!-- <td>
                      <a href="mailto:{{ $user->email }}">
                      <button class="btn btn-primary btn-sm">Send Mail</button></a></td>
                      <td> -->
                    </tr>
                  
                  </tbody>
                  @endforeach
              </div>
        @endforeach
          </table>
      </div>
    </div>
  </div>
@endsection
