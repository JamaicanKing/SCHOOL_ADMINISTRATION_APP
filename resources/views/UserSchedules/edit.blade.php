@extends('layouts.app')



@section('content')

<form method="POST" action="{{ route('userSchedules.update',['userSchedule' => $student->id]) }}" >
    @csrf
    @method('PUT')
    
    <div class="form-group row">
        <label for="user_id"  readonly class="col-md-4 col-form-label text-md-right">{{ __('Student Name') }}</label>

        <div class="col-md-6">
            <input id="user_id" readonly disabled type="text" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ $student->firstname .' '. $student->lastname}}" required autocomplete="user_id" autofocus>
        </div>
    </div>

    @include('common.components.dropDown',
        [
            'fieldLabel' => 'Schedule',
            'fieldName' => 'schedule_id',
            'defaultDropDownOption' => 'Please Select Schedule',
            'options' => $schedules,
            'selectedId' => $schedule_id
        ])

    <input type='hidden' value="{{ $schedule_id }}" name="old_schedule_id">


    <div class="form-group row">
        <div class="col-md-10 text-right">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
  </form>

  @endsection