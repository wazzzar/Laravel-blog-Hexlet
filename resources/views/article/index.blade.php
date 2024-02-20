@extends('layouts.app')

@section('header')
    Список статей <a href="{{ route('articles.create') }}">Добавить</a>
@endsection

@section('content')
    {{Form::open(['route' => 'articles.index', 'method' => 'GET'])}}
        {{Form::text('q', $q)}}
        {{Form::submit('Search')}}
    {{Form::close()}}
    @foreach ($articles as $article)
        <h2>
            <a href="{{route('articles.show', $article)}}">{{$article->name}}</a>
            ({{$article->category}})
            <a href="{{route('articles.edit', $article)}}">Редактировать</a>
        </h2>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
    {{ $articles->links() }}
@endsection
