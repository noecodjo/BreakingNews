@extends('layouts.main')
@section('content')
    <div class="page-header" id="banner">
        <h1>{{ $article->title }}</h1>
        <div class="btn-group" role="group">
            <a class="btn btn-primary" href="{{ url("articles/{$article->id}/edit") }}"> Edit</a>

            {{ FORM::open(array('url' => 'articles/' . $article->id, 'class' => 'pull-right')) }}
            {{ FORM::hidden('_method', 'DELETE') }}
            {{ FORM::submit('Delete', array('class' => 'btn btn-danger')) }}
            {{ FORM::close() }}
            
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            @if($article->image)
                <img src="{{ url($article->image) }}" alt="Article Image" class = "img-responsive" style = "max-width: 50%"/>
            @else
                <img src="{{ url("images/defaultarticle.png") }}" alt="Article Image" class = "img-responsive" style = "max-width: 50%"/>
            @endif
            <br/>
            {{ $article->body }}
        </div>
    </div>
    @unless($article->tags->isEmpty())
    <div>Tags:
        <ul>
            @foreach($article->tags as $tag)
                <li class="label label-primary">{{ $tag->name }}</li>
            @endforeach
        </ul>
    </div>
    @endunless
@stop