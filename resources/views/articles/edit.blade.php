@extends('layouts.main')
@section('content')
    <h1 class="page-title">Edit: {{ $article->title }}</h1>
    <!--{!! FORM::model($article, ['method' => 'PATCH',
    'action' => ['ArticlesController@update', $article->id]]) !!}-->

    {!! FORM::model($article
                , ['method' => 'PATCH'
                , 'action' => ['ArticlesController@update', $article->id]
                , 'files' => true]) !!}
                
    @include('articles._form', ['submitButtonText' => 'Update Article'])
    {!! FORM::close() !!}
    @include('errors.list')
@stop