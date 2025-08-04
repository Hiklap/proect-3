@extends('app.member')

@section('title', 'Заявка на тур - ' . $turi->title)

@section('content')
<div class="container py-3">
    <h1 class="text-center mb-4">Заявка на тур "{{ $turi->title }}"</h1>

    <!-- Форма с рамкой и тенями -->
    <div class="border p-4 rounded shadow-lg">
        <form action="{{ route('tours.apply.store', $turi->id) }}" method="POST">
            @csrf

            <!-- ФИО -->
            <div class="mb-3">
                <label for="fio" class="form-label">ФИО</label>
                <input type="text" class="form-control @error('fio') is-invalid @enderror" id="fio" name="fio" value="{{ old('fio') }}" required>
                @error('fio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Номер телефона -->
            <div class="mb-3">
                <label for="phone" class="form-label">Номер телефона</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" required>
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Электронная почта -->
            <div class="mb-3">
                <label for="email" class="form-label">Электронная почта</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Количество человек -->
            <div class="mb-3">
                <label for="people_count" class="form-label">Количество человек</label>
                <input type="number" class="form-control @error('people_count') is-invalid @enderror" id="people_count" name="people_count" value="{{ old('people_count', 1) }}" min="1" required>
                @error('people_count')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Кнопки -->
            <div class="d-flex justify-content-between">
                <!-- Кнопка отправки -->
                <button type="submit" class="btn" style="background-color: #28a745; color: white; width: 48%;">Отправить заявку</button>
                
                <!-- Кнопка отмены -->
                <a href="{{ route('turies.show', $turi->id) }}" class="btn" style="background-color: #007bff; color: white; width: 48%;">Отмена</a>
            </div>
        </form>
    </div>
</div>
@endsection
