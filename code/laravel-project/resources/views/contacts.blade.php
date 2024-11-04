@extends('main')

@section('content')
    <div class="container"><h1>Контакты</h1>
        <p>Если у вас есть вопросы, не стесняйтесь обращаться к нам!</p>

        <h2>Наши контактные данные</h2>
        <ul>
            <li><strong>Email:</strong> example@example.com</li>
            <li><strong>Телефон:</strong> +1 (234) 567-890</li>
            <li><strong>Адрес:</strong> ул. Примерная, д. 1, Город, Страна</li>
        </ul>

        <h2>Форма обратной связи</h2>
        <form action="" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Сообщение:</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
@endsection
