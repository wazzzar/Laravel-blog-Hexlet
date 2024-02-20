@extends('layouts.app')

@section('content')
    <h1>{{$article->name}}</h1>
    <a href='{{route('article_categories.show', $article->category)}}'>{{ $article->category }}</a>
    <div>{{$article->body}}</div>
@endsection
