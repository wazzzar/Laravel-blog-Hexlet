<table>
    <tr>
        <th>Название</th>
        <th>лайков</th>
    </tr>
    @foreach($articles as $article)
        <tr>
            <td>{{ $article->name }}</td> <td>{{ $article->likes_count }}</td>
        </tr>
    @endforeach
</table>
