@extends('main')

@section('content')
    <h1 style="text-align: center;">Добавить новую новость</h1>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('news.store') }}" method="POST" style="max-width: 400px; margin: 0 auto;">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="title" style="display: inline-block; width: 150px;">Заголовок:</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required style="width: calc(100% - 160px);">
            @error('title')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="content" style="display: inline-block; width: 150px;">Текст новости:</label>
            <textarea id="content" name="content" required style="width: calc(100% - 160px); height: 100px;">{{ old('content') }}</textarea>
            @error('content')
            <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" style="width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">Добавить новость</button>
    </form>
@endsection
