@extends('layouts.app')

@section('content')
 

<div class = "mx-auto" style="width: 1000px;">
  <a href="{{ route("schedules.create") }}">
    <button role="button" class="btn btn-success" type="submit" >ADD Schedules</button>
  </a> 

</div>

<div  class = "mx-auto" style="width: 1000px;">
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Subject</th>
        <th scope="col">Lecturer</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Actions</th>

      </tr>
    </thead>
    <tbody>
    @foreach($schedules as $schedule)
      <tr>
        <td>{{ $schedule->id }}</td>
        <td>{{ $schedule->subject_name}}</td>
        <td>{{ $schedule->lecturer_name }}</td>
        <td>{{ $schedule->start_date }}</td>
        <td>{{ $schedule->end_date }}</td>
        <td>
          <div class="container">
            <div class="row">
              <div class="col" style="padding-right: 0px; flex-grow: 0;">
                  <a href="{{ route("schedules.edit",['schedule' => $schedule->id,'lecturerId' => $schedule->lecturer_user_id,'subjectId' => $schedule->subject_id]) }}">
                    <button role="button" class="btn btn-success" type="submit" >Edit</button>
                  </a> 
              </div>
              <div class="col" style="padding-right: 0px; flex-grow: 0;">
                <form action="{{ route("schedules.destroy",['schedule' => $schedule->id]) }}"" method="POST">
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