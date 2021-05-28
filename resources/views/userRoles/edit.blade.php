@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add Schedule') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('schedules.update', ['schedule' => $schedule_id]) }}">
                            @csrf
                            @method('PUT')
    
                            @include('common.components.dropDown',
                            [
                                'fieldLabel' => 'Subject Name',
                                'fieldName' => 'subject_id',
                                'defaultDropDownOption' => 'Please Select Subject',
                                'options' => $subjects,
                                'selectedId' => $subject_id
                            ])

                            @include('common.components.dropDown',
                            [
                                'fieldLabel' => 'Lecturer Name',
                                'fieldName' => 'lecturer_user_id',
                                'defaultDropDownOption' => 'Please Select Lecturer',
                                'options' => $lecturers,
                                'selectedId' => $lecturer_id
                            ])

                            <div class="form-group row">
                                <label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Start Date') }}</label>

                                <div class="col-md-6">
                                    <input id="start_date" type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ $schedule->start_date }}" required autocomplete="start_date" autofocus>

                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('End Date') }}</label>

                                <div class="col-md-6">
                                    <input id="end_date" type="text" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ $schedule->end_date }}" required autocomplete="end_date" autofocus>

                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

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

