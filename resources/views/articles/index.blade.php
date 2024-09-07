<!DOCTYPE html>
<html>
<head>
    <title>Articles</title>
</head>
<body>
    <h1>User names</h1>

    <form action="../../../app/Http/Controllers/ArticleController.php"
    <h2>Articles List</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Writer Name</th>
                <th>Article Title</th>
                <th>Email</th>
                <th>Categories</th> <!-- New column for categories -->
            </tr>
        </thead>
        <tbody>
            @foreach ($articles as $article)
                <tr>
                    <td>{{ $article->writer_name }}</td>
                    <td>{{ $article->article_title }}</td>
                    <td>{{ $article->user->email }}</td>
                    <td>
                        @foreach ($article->categories as $category)
                            {{ $category->name }}@if (!$loop->last), @endif
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
