@extends('main')

@section('content')
    <div class="container">
        <h1>Редактировать профиль</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->first_name) }}" required>
            </div>

            <div class="form-group">
                <label for="surname">Фамилия</label>
                <input type="text" id="surname" name="surname" class="form-control" value="{{ old('surname', $user->last_name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Электронная почта</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Пароль <small>(оставьте пустым, если не хотите изменять)</small></label>
                <input type="password" id="password" name="password" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>
@endsection
