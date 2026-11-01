<!DOCTYPE html>
<html>
<head>
    <title>Add a Book</title>
</head>
<body>

    <h1>Add a New Book</h1>

    <form action="{{ route('books.store') }}" method="POST">
        @csrf

        <label>Book Title:</label><br>
        <input type="text" name="title" value="{{ old('title') }}">
        @error('title')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>Author:</label><br>
        <input type="text" name="author" value="{{ old('author') }}">
        @error('author')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="to-read" {{ old('status', 'to-read') == 'to-read' ? 'selected' : '' }}>To Read</option>
            <option value="reading" {{ old('status') == 'reading' ? 'selected' : '' }}>Reading</option>
            <option value="finished" {{ old('status') == 'finished' ? 'selected' : '' }}>Finished</option>
        </select>

        @error('status')
            <p>{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Add Book</button>

    </form>

    <br>
    <a href="{{ route('books.index') }}">Back to Reading List</a>

</body>
</html>