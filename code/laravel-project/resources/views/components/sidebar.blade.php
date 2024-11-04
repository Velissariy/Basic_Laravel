<nav class="col-md-3 bg-light sidebar">
    <h4 class="sidebar-heading">Навигация</h4>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('home') }}">Главная</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('users') }}">Пользователи</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('contacts') }}">Контакты</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('log-request') }}">Лог запросов</a>
        </li>
    </ul>
</nav>