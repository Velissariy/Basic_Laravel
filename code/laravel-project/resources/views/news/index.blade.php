@extends('main')

@section('content')
    <h1>Список новостей</h1>
    <a href="{{ route('news.create') }}">Добавить новость</a>
    <x-news-list :news="$news" />
@endsection