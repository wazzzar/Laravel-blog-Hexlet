@extends('layouts.app')

@section('content')
    <h1>{{$article_cat->name}}</h1>
    <div>{{$article_cat->description}}</div>
    {{-- BEGIN (write your solution here) --}}
    @if( $article_cat->articles->isNotEmpty() )
        <h2>Статьи</h2>
        <ol>
            @foreach($article_cat->articles as $article)
            <li><a href="{{route('articles.show', $article)}}">{{$article->name}}</a></li>
            @endforeach
        </ol>
    @endif
    {{-- END --}}
@endsection
