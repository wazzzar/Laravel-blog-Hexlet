
@extends('layouts.app')

@section('header', 'Редактирование статьи')

@section('content')
{{ Form::model($article, ['route' => ['articles.update', $article], 'method' => 'PATCH']) }}
    @include('article.form')
    {{ Form::submit('Сохранить') }}
{{ Form::close() }}
@endsection
