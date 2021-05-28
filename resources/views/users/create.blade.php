@extends('layouts.app')

@section('content')
@include('common.forms.addUser',
    [
        'pageTitle' => 'Add User',
        'routeName'=> 'users.store',
        'submitButtonName' => 'Add User'

    ])
@endsection