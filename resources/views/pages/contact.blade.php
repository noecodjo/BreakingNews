@extends('layouts.main')
@section('site_title', 'Contact Me')
@section('content')
    <h1>Contact Me {{ $first }}  {{ $last }}</h1>
    <p>{{ $contact }}</p>
    <a href="{{ url('pages/about') }}">About Me</a>
@stop