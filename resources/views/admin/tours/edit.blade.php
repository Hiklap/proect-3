@extends('app.member')
@section('title', 'Админ-панель: Редактирование тура')
@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4 text-primary fw-bold">Редактирование тура: {{ $tour->title }}</h1>

    <!-- Форма с рамкой и тенями -->
    <div class="border p-4 rounded shadow-lg">
        <form action="{{ route('admin.tours.update', $tour->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Название -->
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $tour->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Описание -->
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description', $tour->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Длительность -->
            <div class="mb-3">
                <label for="duration" class="form-label">Длительность (дней)</label>
                <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration', $tour->duration) }}" min="1" required>
                @error('duration')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Цена -->
            <div class="mb-3">
                <label for="cost" class="form-label">Цена (₽)</label>
                <input type="text" class="form-control @error('cost') is-invalid @enderror" id="cost" name="cost" value="{{ old('cost', $tour->cost) }}" min="0" required>
                @error('cost')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Кнопка отправки -->
            <div class="d-flex justify-content-between">
                <!-- Кнопка обновить -->
                <button type="submit" class="btn" style="background-color: #9b59b6; color: white; width: 48%; border-radius: 30px;">Обновить тур</button>
                
                <!-- Кнопка отмены -->
                <a href="{{ route('admin.tours.index') }}" class="btn" style="background-color: #e74c3c; color: white; width: 48%; border-radius: 30px;">Отмена</a>
            </div>
        </form>
    </div>
</div>
@endsection
