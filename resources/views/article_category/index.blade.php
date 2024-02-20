@extends('layouts.app')

@section('content')
<table>
@foreach($article_categories as $article_category)
    <tr>
        <td>{{ $article_category->name }}</td>
        <td>{{ $article_category->description }}</td>
    </tr>
@endforeach
</table>
@endsection
