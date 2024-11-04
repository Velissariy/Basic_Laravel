<header class="bg-primary text-white text-center py-3">
    <h1>Моя Шапка</h1>
    <nav>
        @if(isset($user) && !empty($user['name']) && !empty($user['surname']))
            <span>Привет, {{ $user['name'] }} {{ $user['surname'] }}</span>
        @else
            <a class="text-white" href="{{ route('register') }}">Регистрация</a>
        @endif
    </nav>
</header>
