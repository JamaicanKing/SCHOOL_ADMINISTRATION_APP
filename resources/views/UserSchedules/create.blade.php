@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Schedule for Student') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('userSchedules.store') }}">
                            @csrf
    
                            @include('common.components.dropDown',
                            [
                                'fieldLabel' => 'Student Name',
                                'fieldName' => 'user_id',
                                'defaultDropDownOption' => 'Please Select Student Name',
                                'options' => $students
                            ])

                            @include('common.components.dropDown',
                            [
                                'fieldLabel' => 'Schedule',
                                'fieldName' => 'schedule_id',
                                'defaultDropDownOption' => 'Please Select Schedule',
                                'options' => $schedules
                            ])


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Add Schedule') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection