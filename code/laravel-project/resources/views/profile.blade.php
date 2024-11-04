@extends('main')

@section('content')
    <div class="container">
        <h1>Профиль пользователя</h1>

        <div class="card">
            <div class="card-body">
                <h2>{{ $user->first_name }} {{ $user->last_name }}</h2>
                <p><strong>Электронная почта:</strong> {{ $user->email }}</p>
            </div>
        </div>

        <a href="{{ route('edit.profile', $user->id) }}" class="btn btn-secondary mt-3">Редактировать профиль</a>
    </div>
@endsection
