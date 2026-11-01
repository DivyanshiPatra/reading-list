<!DOCTYPE html>
<html>
<head>
    <title>My Reading List</title>
</head>
<body>

    <h1>My Reading List</h1>

    @if($books->isEmpty())
        <p>No books yet</p>
    @else
        @foreach($books as $book)
            <div>
                <h3>{{ $book->title }}</h3>
                <p>Author: {{ $book->author }}</p>
                <p>Status: {{ $book->status }}</p>
<a href="{{ route('books.edit', $book) }}">Edit</a>
            </div>
            <hr>
        @endforeach
    @endif

</body>
</html>