@extends('layouts.app')

@section('content')
 

<div class = "mx-auto" style="width: 1000px;">
  <a href="{{ route("userRoles.create") }}">
    <button role="button" class="btn btn-success" type="submit" >ADD User Role</button>
  </a> 

</div>

<div  class = "mx-auto" style="width: 1000px;">
<table class="table table-striped">
    <thead>
      <tr>

        <th scope="col">User Name</th>
        <th scope="col">Role</th>
        <th scope="col">Actions</th>

      </tr>
    </thead>
    <tbody>
    @foreach($UserRoles as $UserRole)
      <tr>
        <td>{{ $UserRole->user_name}}</td>
        <td>{{ $UserRole->role_name }}</td>
        <td>
          <div class="container">
            <div class="row">
              <div class="col" style="padding-right: 0px; flex-grow: 0;">
                  <a href="{{ route("userRoles.edit",['userRole' => $UserRole->user_id]) }}">
                    <button role="button" class="btn btn-success" type="submit" >Edit</button>
                  </a> 
              </div>
              <div class="col" style="padding-right: 0px; flex-grow: 0;">
                <form action="{{ route("userRoles.destroy",['userRole' => $UserRole->user_id]) }}"" method="POST">
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