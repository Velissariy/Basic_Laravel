<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Мое приложение</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('components.header')

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-3 bg-light sidebar">
            <h4 class="sidebar-heading">Навигация</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('home') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users') }}">Пользователи</a>
                </li>
            </ul>
        </nav>

        <main class="col-md-9 ml-sm-auto col-lg-9 px-4">
            @yield('content')
        </main>
    </div>
</div>

@include('components.footer')

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
