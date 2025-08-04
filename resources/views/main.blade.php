@extends('app.member')
@section('title', 'Океанские приключения')
@section('content')

<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-md-6 order-md-1 text-center">
            <img src="{{ asset('img/wh.jpg') }}" class="img-fluid rounded shadow-lg" alt="Киты и океан" width="100%" loading="lazy">
        </div>
        <div class="col-md-6 order-md-0">
            <h1 class="fw-bold text-deep-blue">Исследуйте неизведанные воды</h1>
            <p class="text-dark">Отправьтесь в незабываемое путешествие по океанским просторам, где вас ждут захватывающие встречи с китами и дикой природой. Почувствуйте силу моря и раскройте тайны его глубин.</p>
            <div class="mt-4">
                <a href="{{ route('turies.index') }}" class="btn btn-deep-blue px-5 py-3 fw-bold">Открыть маршруты</a>
                <a href="#about" class="btn btn-outline-dark px-5 py-3 fw-bold ms-3">Подробнее</a>
            </div>
        </div>
    </div>
</div>

@endsection
