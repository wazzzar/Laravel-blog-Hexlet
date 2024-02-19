<ul>
    @foreach($articles as $article)
    <li>{{ $article->name }} - {{ $article->body }}</li>
    @endforeach
</ul>
