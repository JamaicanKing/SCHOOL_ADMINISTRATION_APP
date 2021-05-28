@extends('layouts.app')


@section('content')

<form method="POST" action="{{ route('users.update',['user' => $user->id]) }}" >
    @csrf
    @method('PUT')
    
    <div class="form-group row">
        <label for="firstname" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

        <div class="col-md-6">
            <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ $user->firstname }}" required autocomplete="firstname" autofocus>

            @error('firstname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

        <div class="col-md-6">
            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ $user->lastname }}" required autocomplete="lastname" autofocus>

            @error('lastname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="user_type_id" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>

        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" id="user_type_id"  name="user_type_id" value="{{ $user->user_type_id }}">
                <option {{ ($user->user_type_id == '1') ? 'selected' : '' }} value="1">Student</option>
                <option {{ ($user->user_type_id == '2') ? 'selected' : '' }} value="2">Teacher</option>
            </select>
            @error('user_type_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" id="gender" name="gender">
                <option  {{ ($user->gender == 'MALE') ? 'selected' : '' }} value="MALE">Male</option>
                <option  {{ ($user->gender == 'FEMALE') ? 'selected' : '' }} value="FEMALE">Female</option>
            </select>
            @error('gender')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

        <div class="col-md-6">
            <select class="form-select" aria-label="Default select example" id="status" name="status">
                <option {{ ($user->status == 'ACTIVE') ? 'selected' : '' }} value="ACTIVE">ACTIVE</option>
                <option {{ ($user->status == 'INACTIVE') ? 'selected' : '' }} value="INACTIVE">INACTIVE</option>
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-10 text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
  </form>

  @endsection