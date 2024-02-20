@extends('layouts.app')

@section('header', 'Список категорий')

@section('content')
<table>
@foreach($article_categories as $article_category)
    <tr>
        <td><a href="{{route('article_categories.show', $article_category)}}">{{ $article_category }}</a></td>
        <td>{{ $article_category->description }}</td>
    </tr>
@endforeach
</table>
@endsection
