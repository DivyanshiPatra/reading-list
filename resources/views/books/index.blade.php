<!DOCTYPE html>
<html>
<head>
    <title>My Reading List</title>
</head>
<body>

    <h1>My Reading List</h1>

    <h3>Book Summary</h3>

    <p>To Read: {{ $statusCounts['to-read'] ?? 0 }}</p>
    <p>Reading: {{ $statusCounts['reading'] ?? 0 }}</p>
    <p>Finished: {{ $statusCounts['finished'] ?? 0 }}</p>

    <hr>

    <h3>Search Books</h3>

    <form action="{{ route('books.index') }}" method="GET">
        <input
            type="text"
            name="search"
            placeholder="Search by title or author"
            value="{{ request('search') }}"
        >

        @if(request('status'))
            <input type="hidden" name="status" value="{{ request('status') }}">
        @endif

        <button type="submit">Search</button>
        <a href="{{ route('books.index') }}">Clear</a>
    </form>

    <p>
        <a href="{{ route('books.index') }}">All</a> |
        <a href="{{ route('books.index', ['status' => 'to-read']) }}">To Read</a> |
        <a href="{{ route('books.index', ['status' => 'reading']) }}">Reading</a> |
        <a href="{{ route('books.index', ['status' => 'finished']) }}">Finished</a>
    </p>

    <a href="{{ route('books.create') }}">Add New Book</a>

    <br><br>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if($books->isEmpty())
        <p>No books found.</p>
    @else
        @foreach($books as $book)
            <div>
                <h3>{{ $book->title }}</h3>
                <p>Author: {{ $book->author }}</p>
                <p>Status: {{ ucwords(str_replace('-', ' ', $book->status)) }}</p>

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