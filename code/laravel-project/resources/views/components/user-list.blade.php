@if($users->isEmpty())
    <p>Пользователи не найдены.</p>
@else
    <div class="container">
        <h1>Список пользователей</h1>
        <div class="row bg-light font-weight-bold p-2">
            <div class="col">Имя</div>
            <div class="col">Фамилия</div>
            <div class="col">Email</div>
        </div>
        @foreach($users as $user)
            <div class="row border-bottom p-2">
                <div class="col">{{ $user->first_name }}</div>
                <div class="col">{{ $user->last_name }}</div>
                <div class="col">{{ $user->email }}</div>
            </div>
        @endforeach
    </div>
@endif
