@extends('app.member')
@section('title', 'Экскурсии с китами')
@section('content')

<div class="container my-5">
    <div class="row">
        <!-- Блок фильтрации слева -->
        <div class="col-lg-3">
            <div class="bg-light-blue p-4 rounded shadow">
                <h5 class="text-ocean">Поиск и фильтрация</h5>
                <form action="{{ route('turies.index') }}" method="GET" class="d-flex flex-column">
                    <input type="search" name="search" class="form-control mb-3 border-ocean" placeholder="Найти приключение..." value="{{ request('search') }}">
                    <select name="price_filter" class="form-select border-ocean mb-3" onchange="this.form.submit()">
                        <option value="">Стоимость</option>
                        <option value="asc" {{ request('price_filter') == 'asc' ? 'selected' : '' }}>Бюджетные</option>
                        <option value="desc" {{ request('price_filter') == 'desc' ? 'selected' : '' }}>Премиальные</option>
                    </select>
                    <select name="duration_filter" class="form-select border-ocean mb-3" onchange="this.form.submit()">
                        <option value="">Продолжительность</option>
                        <option value="asc" {{ request('duration_filter') == 'asc' ? 'selected' : '' }}>Короткие</option>
                        <option value="desc" {{ request('duration_filter') == 'desc' ? 'selected' : '' }}>Долгие</option>
                    </select>
                    <button type="submit" class="btn" style="background-color: #20c997; color: white; width: 100%; margin-bottom: 10px;">Поиск</button>
                    <a href="{{ route('turies.index') }}" class="btn" style="border: 2px solid #20c997; color: #20c997; width: 100%;">Сброс</a>
                </form>
            </div>
        </div>

        <!-- Основной контент справа -->
        <div class="col-lg-9">
            <h1 class="text-center mb-5 text-ocean fw-bold">Путешествия по бескрайнему океану</h1>
            <div class="bg-light-blue py-5">
                <div class="container">
                    <div class="row row-cols-1 g-4">
                        @foreach($turies as $turi)
                        <div class="col">
                            <a href="{{ route('turies.show', $turi->id) }}" class="text-decoration-none text-ocean">
                                <div class="card border-0 shadow-lg rounded overflow-hidden">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('img/wh.jpg') }}" class="img-fluid rounded-start" alt="{{ $turi->title }}">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body d-flex flex-column bg-white">
                                                <h4 class="mb-2 text-ocean">{{ $turi->title }}</h4>
                                                <p class="card-text text-muted flex-grow-1">{{ $turi->description }} человек</p>
                                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                                    <small class="text-muted">Длительность: {{ $turi->duration }} дней</small>
                                                    <strong class="text-deep-ocean fs-5">{{ $turi->cost }} ₽</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection