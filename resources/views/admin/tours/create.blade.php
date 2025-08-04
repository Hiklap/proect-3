@extends('app.member')
@section('title', 'Админ-панель: Создание тура')
@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Создание нового тура</h1>

    <!-- Форма с рамкой и тенями -->
    <div class="border p-4 rounded shadow-lg">
        <form action="{{ route('admin.tours.store') }}" method="POST">
            @csrf

            <!-- Название -->
            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Описание -->
            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Размер группы -->
            <div class="mb-3">
                <label for="size_group" class="form-label">Размер группы</label>
                <input type="text" class="form-control @error('size_group') is-invalid @enderror" id="size_group" name="size_group" value="{{ old('size_group') }}" min="1" required>
                @error('size_group')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Длительность -->
            <div class="mb-3">
                <label for="duration" class="form-label">Длительность (дней)</label>
                <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" value="{{ old('duration') }}" min="1" required>
                @error('duration')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Цена -->
            <div class="mb-3">
                <label for="cost" class="form-label">Цена (₽)</label>
                <input type="text" class="form-control @error('cost') is-invalid @enderror" id="cost" name="cost" value="{{ old('cost') }}" min="0" required>
                @error('cost')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Кнопки -->
            <div class="d-flex justify-content-between">
                <!-- Кнопка отправки -->
                <button type="submit" class="btn" style="background-color: #20c997; color: white; width: 48%;">Создать тур</button>
                
                <!-- Кнопка отмены -->
                <a href="{{ route('admin.tours.index') }}" class="btn" style="background-color: #007bff; color: white; width: 48%;">Отмена</a>
            </div>
        </form>
    </div>
</div>
@endsection
