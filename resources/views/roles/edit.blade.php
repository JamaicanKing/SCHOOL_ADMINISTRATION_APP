@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Subject') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('subjects.update',['subject' => $subject->id],) }}" >
                        @method('PUT')
                        
                        <div class="form-group row">
                            <div class="form-group row">
                                <label for="subject_name" class="col-md-4 col-form-label text-md-right">{{ __('Subject Name') }}</label>

                                <div class="col-md-6">
                                    <input id="subject_name" type="text" class="form-control @error('subject_name') is-invalid @enderror" name="subject_name" value="{{ $subject->name }}" required autocomplete="start_date" autofocus>

                                    @error('subject_name')
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
                </div>
            </div>
        </div>
    </div>
</div>

  @endsection