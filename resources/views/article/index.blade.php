@extends('layouts.app')

@section('header', 'Список статей')

@section('content')
    @foreach ($articles as $article)
        <h2><a href="/articles/{{$article->id}}">{{$article->name}}</a></h2>
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
    {{ $articles->links() }}
@endsection
