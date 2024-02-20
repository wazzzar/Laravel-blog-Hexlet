@extends('layouts.app')

@section('header')
    Список категорий <a href="{{ route('article_categories.create') }}">Добавить</a>
@endsection

@section('content')
<table>
    <tr>
        <td>Название</td>
        <td>Описание</td>
        <td>Статьи</td>
    </tr>
@foreach($article_categories as $article_category)
    <tr>
        <td><a href="{{route('article_categories.show', $article_category)}}">{{ $article_category }}</a></td>
        <td>{{ $article_category->description }}</td>
        <td>
            <ul>
            @foreach($article_category->articles as $article)
                <li><a href="{{route('articles.index', $article)}}">{{$article->name}}</a></li>
            @endforeach
            </ul>
        </td>
    </tr>
@endforeach
</table>
@endsection
