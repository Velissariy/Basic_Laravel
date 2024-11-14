@extends('main')

@section('content')
    <h1 style="text-align: center;">Добавить новую книгу</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('book.store') }}" method="POST" style="max-width: 400px; margin: 0 auto;">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="title" style="display: inline-block; width: 150px;">Название:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required style="width: calc(100% - 160px);">
            @error('title')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="author" style="display: inline-block; width: 150px;">Автор:</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}" required style="width: calc(100% - 160px);">
            @error('author')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="published_year" style="display: inline-block; width: 150px;">Год издания:</label>
            <input type="number" id="published_year" name="published_year" value="{{ old('published_year') }}" required style="width: calc(100% - 160px);" min="1000" max="9999" maxlength="4">
            @error('published_year')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="genre" style="display: inline-block; width: 150px;">Жанр:</label>
            <select id="genre" name="genre" required style="width: calc(100% - 160px);">
                <option value="">Выберите жанр</option>
                <option value="fantasy" {{ old('genre') == 'fantasy' ? 'selected' : '' }}>Фэнтези</option>
                <option value="sci-fi" {{ old('genre') == 'sci-fi' ? 'selected' : '' }}>Научная фантастика</option>
                <option value="romance" {{ old('genre') == 'romance' ? 'selected' : '' }}>Романтика</option>
                <option value="mystery" {{ old('genre') == 'mystery' ? 'selected' : '' }}>Детектив</option>
                <option value="non-fiction" {{ old('genre') == 'non-fiction' ? 'selected' : '' }}>Документальная</option>
            </select>
            @error('genre')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Добавить книгу</button>
    </form>
@endsection
