@extends('app.member')
@section('title', 'Админ-панель: Туры')
@section('content')
<div class="container py-5">
    <!-- Заголовок -->
    <h1 class="mb-4 text-center text-primary fw-bold">Список туров</h1>

    <!-- Кнопка "Добавить тур" -->
    <div class="d-flex justify-content-start mb-4">
        <a href="{{ route('admin.tours.create') }}" class="btn" style="background-color: #4db8b8; color: white; font-weight: bold; border-radius: 50px; padding: 15px 30px;">Добавить тур</a>
    </div>

    <!-- Таблица туров -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover shadow-lg">
            <thead class="bg-primary text-white">
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Длительность</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tours as $tour)
                <tr>
                    <td>{{ $tour->id }}</td>
                    <td>{{ $tour->title }}</td>
                    <td>{{ $tour->duration }}</td>
                    <td>{{ $tour->cost }} ₽</td>
                    <td class="d-flex justify-content-between">
                        <!-- Кнопка "Редактировать" -->
                        <a href="{{ route('admin.tours.edit', $tour->id) }}" class="btn" style="background-color: #9b59b6; color: white; border-radius: 50px; padding: 10px 25px;">Редактировать</a>
                        
                        <!-- Кнопка "Удалить" -->
                        <form action="{{ route('admin.tours.destroy', $tour->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn" style="background-color: #e74c3c; color: white; border-radius: 50px; padding: 10px 25px;" onclick="return confirm('Ты точно уверен?')">Удалить</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
