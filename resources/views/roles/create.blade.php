@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Role') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('roles.store') }}" >
                        @csrf
                        
                        <div class="form-group row">
                            <div class="form-group row">
                                <label for="roles" class="col-md-4 col-form-label text-md-right">{{ __('Role Name') }}</label>

                                <div class="col-md-6">
                                    <input id="roles" type="text" class="form-control @error('roles') is-invalid @enderror" name="rol" value="{{ old("roles") }}" required autocomplete="roles" autofocus>

                                    @error('roles')
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