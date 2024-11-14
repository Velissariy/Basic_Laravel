<style>
    .book-list {
        width: 100%; /* Ширина списка */
        border-collapse: collapse; /* Убирает промежутки между ячейками */
    }

    .book-list-header,
    .book-list-row {
        display: flex; /* Используем Flexbox для выравнивания */
        justify-content: space-between; /* Равномерное распределение пространства между элементами */
        padding: 10px; /* Отступы вокруг ячеек */
        border: 1px solid #ddd; /* Рамка вокруг ячеек */
    }

    .book-list-cell {
        flex: 1; /* Ячейки растягиваются равномерно */
        text-align: left; /* Выравнивание текста влево */
    }

    .book-list-header {
        background-color: #f2f2f2; /* Цвет фона для заголовка */
        font-weight: bold; /* Полужирный шрифт для заголовка */
    }

    button {
        cursor: pointer; /* Указатель на кнопку */
    }
</style>

<div class="book-list">
    <div class="book-list-header">
        <div class="book-list-cell">ID</div>
        <div class="book-list-cell">Название</div>
        <div class="book-list-cell">Автор</div>
        <div class="book-list-cell">Год издания</div>
        <div class="book-list-cell">Жанр</div>
        <div class="book-list-cell">Действия</div>
    </div>

    @foreach($books as $book)
        <div class="book-list-row">
            <div class="book-list-cell">{{ $book->id }}</div>
            <div class="book-list-cell">{{ $book->title }}</div>
            <div class="book-list-cell">{{ $book->author }}</div>
            <div class="book-list-cell">{{ $book->published_year }}</div>
            <div class="book-list-cell">{{ $book->genre }}</div>
            <div class="book-list-cell">
                <form action="{{ route('book.delete', $book->id) }}" method="POST" onsubmit="return confirm('Удалить книгу?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color: red;">Удалить</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
