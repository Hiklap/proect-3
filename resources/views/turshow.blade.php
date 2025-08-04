@extends('app.member')

@section('title', $turi->title)

@section('content')
<div class="container py-4">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Заголовок тура -->
    <h1 class="text-center mb-4">{{ $turi->title }}</h1>

    <!-- Сетка для картинки и текста -->
    <div class="row">
        <!-- Картинка -->
        <div class="col-md-4 mb-4">
            <img src="{{ asset('img/wh.jpg') }}" class="img-fluid rounded shadow-lg" alt="{{ $turi->title }}">
        </div>

        <!-- Описание тура -->
        <div class="col-md-8">
            <p><strong>Описание:</strong> {{ $turi->description }}</p>
            <p><strong>Размер группы:</strong> {{ $turi->size_group }} человек</p>
            <p><strong>Длительность:</strong> {{ $turi->duration }} дней</p>
            <p><strong>Цена:</strong> {{ $turi->cost }} ₽</p>
        </div>
    </div>

    <!-- Кнопки -->
    <div class="d-flex justify-content-between mt-4">
        <!-- Кнопка заявки на тур (Темно-зеленая) -->
        <a href="{{ route('tours.apply', $turi->id) }}" class="btn" style="background-color: #28a745; color: white; width: 48%;">Заявка на тур</a>
        
        <!-- Кнопка назад (Темно-синяя) -->
        <a href="{{ url()->previous() }}" class="btn" style="background-color: #007bff; color: white; width: 48%;">Назад</a>
    </div>
</div>
@endsection
