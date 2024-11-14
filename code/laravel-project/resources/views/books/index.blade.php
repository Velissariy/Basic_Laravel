@extends('main')

@section('content')
    <h1>Список книг</h1>
    <a href="{{ route('book.create') }}">Добавить новую книгу</a>
    <x-book-list :books="$books" />
@endsection
