
@extends('layouts.app')

@section('header', 'Редактирование категории')

@section('content')
{{ Form::model($category, ['route' => ['article_categories.update', $category], 'method' => 'PATCH']) }}
    @include('article_category.form')
    {{ Form::submit('Сохранить') }}
{{ Form::close() }}
@endsection
