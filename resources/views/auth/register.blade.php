@extends('layouts.app')

@section('content')
@include('common.forms.addUser', ['pageTitle' => 'Register User','routeName'=> 'register','submitButtonName' => 'Register'])
@endsection
