@extends('layouts.app')


@section('content')
 

<div class = "mx-auto" style="width: 1000px;">
  <a href="{{ route("userSchedules.create") }}">
    <button role="button" class="btn btn-success" type="submit" >ADD Schedule</button>
  </a> 

</div>

<div  class = "mx-auto" style="width: 1000px;">
    <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Student Name</th>
        <th scope="col">Subject</th>
        <th scope="col">Lecturer</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($userSchedules as $userSchedule)
        <tr>
            <td>{{ $userSchedule->student_name }}</td>
            <td>{{ $userSchedule->subject_name }}</td>
            <td>{{ $userSchedule->lecturer_name }}</td>
            <td>{{ $userSchedule->start_date}} </td>
            <td>{{ $userSchedule->end_date}} </td>
            <td>
                <div class="container">
                    <div class="row">
                        <div class="col" style="padding-right: 0px; flex-grow: 0;">
                            <a href="{{ route("userSchedules.edit",['userSchedule' => $userSchedule->user_id, 'scheduleId' => $userSchedule->schedule_id]) }}">
                                <button role="button" class="btn btn-success" type="submit" >Edit</button>
                            </a> 
                        </div>
                        <div class="col" style="padding-right: 0px; flex-grow: 0;">
                            <form action="{{ route("userSchedules.destroy",['userSchedule' => $userSchedule->user_id, 'scheduleId' => $userSchedule->schedule_id]) }}" method ="POST">
                                @csrf
                                @method("Delete")
                                <button role="button" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            <td>
        </tr>
        @endforeach
    
    </tbody>
    </table>
</div>
  
  @endsection