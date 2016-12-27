@extends('layouts.main')
@section('content')
    <h1 class="page-title">Write a New Article</h1>
    <!--{!! FORM::open(['url' => 'articles']) !!}-->
    {!! FORM::open(['url' => 'articles', 'files' => true ]) !!}
    @include('articles._form', ['submitButtonText' => 'Add Article'])
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {!! FORM::close() !!}
    @include('errors.list')
@stop