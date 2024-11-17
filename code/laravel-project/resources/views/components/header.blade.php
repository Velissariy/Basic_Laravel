<header class="bg-primary text-white text-center py-3">
    <h1>Моя Шапка</h1>
    <nav>
        @if(Auth::check())
            <a class="text-white" href="{{ route('profile.edit', ['id' => Auth::user()->id]) }}">Привет, {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
{{--            <a class="text-white" href="{{ route('logout') }}">Выход</a>--}}
        @else
            <a class="text-white" href="{{ route('register') }}">Регистрация</a>
            <a class="text-white" href="{{ route('login') }}">Вход</a>
        @endif
    </nav>
</header>
