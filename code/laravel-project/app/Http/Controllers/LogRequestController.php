@extends('main')

@section('content')
    <h1>Логи запросов</h1>

    @if($logs->isEmpty())
        <div class="alert alert-warning" role="alert">
            Нет доступных логов.
        </div>
    @else
        <div class="log-table">
            <div class="log-header d-flex fw-bold">
                <div class="log-cell" style="flex: 1;">Лог ID</div>
                <div class="log-cell" style="flex: 2;">URL</div>
                <div class="log-cell" style="flex: 1;">Метод</div>
                <div class="log-cell" style="flex: 1;">IP адрес</div>
                <div class="log-cell" style="flex: 1;">Пользователь</div>
                <div class="log-cell" style="flex: 2;">Дата запроса</div>
                <div class="log-cell" style="flex: 2;">Время выполнения</div>
            </div>

            @foreach($logs as $index => $log)
                <div class="log-row d-flex {{ $index % 2 == 0 ? 'bg-light' : 'bg-secondary text-white' }}">
                    <div class="log-cell" style="flex: 1;">{{ $log->id }}</div>
                    <div class="log-cell" style="flex: 2;">{{ $log->url }}</div>
                    <div class="log-cell" style="flex: 1;">{{ $log->method }}</div>
                    <div class="log-cell" style="flex: 1;">{{ $log->IP ?: '—' }}</div>
                    <div class="log-cell" style="flex: 1;">{{ $log->user ? $log->user->first_name . ' ' . $log->user->last_name : 'Гость' }}</div>
                    <div class="log-cell" style="flex: 2;">{{ $log->created_at }}</div>
                    <div class="log-cell" style="flex: 2;">{{ $log->duration }}</div>
                </div>
            @endforeach
        </div>

        <!-- Пагинация -->
        {{ $logs->links('pagination::bootstrap-4') }}
    @endif
@endsection