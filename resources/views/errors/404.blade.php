@extends('templates.default')

@section('container-fluid')
    <h3>Oops, that page could not be found.</h3>
    <a href="{{ route('home') }}">Go home</a>
@stop
