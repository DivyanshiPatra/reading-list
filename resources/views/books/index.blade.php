<!DOCTYPE html>
<html>
<head>
    <title>My Reading List</title>
</head>
<body>

    <h1>My Reading List</h1>

    <a href="{{ route('books.create') }}">Add New Book</a>

    <br><br>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if($books->isEmpty())
        <p>No books yet</p>
    @else
        @foreach($books as $book)
            <div>
                <h3>{{ $book->title }}</h3>
                <p>Author: {{ $book->author }}</p>
                <p>Status: {{ $book->status }}</p>

                <a href="{{ route('books.edit', $book) }}">Edit</a>

                <form action="{{ route('books.destroy', $book) }}" method="POST"
                    onsubmit="return confirm('Are you sure?')">

                    @csrf
                    @method('DELETE')

                    <button type="submit">Delete</button>
                </form>

            </div>
            <hr>
        @endforeach
    @endif

</body>
</html>