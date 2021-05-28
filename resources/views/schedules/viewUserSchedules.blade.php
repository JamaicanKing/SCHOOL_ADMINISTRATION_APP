@extends('layouts.app')

@section('content')

<div  class = "mx-auto" style="width: 1000px;">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Subject</th>
            <th scope="col">Lecturer</th>
            <th scope="col">Start Date</th>
            <th scope="col">End Date</th>
            <th scope="col">Action</th>
    
          </tr>
        </thead>
        <tbody>
            @foreach($user->schedules as $scheduleInfo) 
            <tr>
            
                <td>{{ $user->id }}</td>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $scheduleInfo->subject_name }}</td>
                <td>{{ $scheduleInfo->lecturer_name }}</td>
                <td>{{ $scheduleInfo->start_date }}</td>
                <td>{{ $scheduleInfo->end_date }}</td>
                
                <td>
                    <form action="{{ route("users.destroy",['user' => $user->id]) }}"" method="POST">
                        @csrf
                        @method("Delete")
                        <button role="button" class="btn btn-danger">Delete</button>
                    </form> 
                <td>
            </tr>
            @endforeach
        </tbody>
      </table>
    </div>


@endsection