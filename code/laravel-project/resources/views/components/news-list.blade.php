<style>
    .news-list {
        width: 100%; /* Ширина списка */
        border-collapse: collapse; /* Убирает промежутки между ячейками */
    }

    .news-list-header,
    .news-list-row {
        display: flex; /* Используем Flexbox для выравнивания */
        justify-content: space-between; /* Равномерное распределение пространства между элементами */
        padding: 10px; /* Отступы вокруг ячеек */
        border: 1px solid #ddd; /* Рамка вокруг ячеек */
    }

    .news-list-cell {
        flex: 1; /* Ячейки растягиваются равномерно */
        text-align: left; /* Выравнивание текста влево */
    }

    .news-list-header {
        background-color: #f2f2f2; /* Цвет фона для заголовка */
        font-weight: bold; /* Полужирный шрифт для заголовка */
    }

    .hidden-news {
        color: rgba(102, 102, 102, 0.2); /* Цвет текста с низкой непрозрачностью */
    }

    button {
        cursor: pointer; /* Указатель на кнопку */
    }
</style>

<div class="news-list">
    <div class="news-list-header">
        <div class="news-list-cell">Заголовок</div>
        <div class="news-list-cell">Дата публикации</div>
        <div class="news-list-cell">Действия</div>
    </div>

    @foreach($news as $item)
        <div class="news-list-row {{ $item->hidden ? 'hidden-news' : '' }}" id="news-row-{{ $item->id }}">
            <div class="news-list-cell">{{ $item->title }}</div>
            <div class="news-list-cell">{{ $item->published_date }}</div>
            <div class="news-list-cell">
                <!-- Форма для удаления новости -->
                <form action="{{ route('news.delete', $item->id) }}" method="POST" onsubmit="return confirm('Удалить новость?');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="color: red;">Удалить</button>
                </form>

                <!-- Форма для скрытия новости -->
                <form action="{{ route('news.hidden', $item->id) }}" method="POST" onsubmit="return confirm('Скрыть новость?');" style="display: inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit" style="color: gray;">Скрыть</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
