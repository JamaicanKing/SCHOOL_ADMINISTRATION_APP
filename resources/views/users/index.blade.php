@extends('layouts.app')

@section('content')
    

<div class = "mx-auto" style="width: 1000px;">
  <a href="{{ route("users.create") }}">
    <button role="button" class="btn btn-success" type="submit" >ADD User</button>
  </a> 

</div>


<div  class = "mx-auto" style="width: 1000px;">
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Gender</th>
        <th scope="col">Email</th>
        <th scope="col">Actions</th>

      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td>{{ $user->firstname }}</td>
        <td>{{ $user->lastname }}</td>
        <td>{{ $user->gender }}</td>
        <td>{{ $user->email }}</td>
        <td>
          @if(Auth::user()->hasRole('admin'))
          <div class="container">
            <div class="row">
              <div class="col" style="padding-right: 0px; flex-grow: 0;">
                <a href="{{ route("users.edit",['user' => $user->id]) }}">
                  <button role="button" class="btn btn-success" type="submit" >Edit</button>
                </a>
              </div>
              <div class="col" style="padding-left: 2px; padding-right: 0px; flex-grow: 0;">
                <a href="{{ route("schedules.viewUserSchedules",['id' => $user->id]) }}">
                  <button role="button" class="btn btn-primary" type="submit" >Schedules</button>
                </a>
              </div>
              <div class="col" style="padding-left: 2px; flex-grow: 0;">
                <form action="{{ route("users.destroy",['user' => $user->id]) }}" method="POST">
                  @csrf
                  @method("Delete")
                  <button role="button" class="btn btn-danger">Delete</button>
                </form>
              </div>
            </div>
          </div>
          @endif
        <td>
      </tr>
      @endforeach
    
    </tbody>
  </table>
</div>
  
  @endsection