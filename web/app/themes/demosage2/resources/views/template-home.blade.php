{{--
  Template Name: Home Template
--}}
@extends ('layouts.app')

@section('content')
    <div class="banner-container">
        <img class="banner-image" src="/app/uploads/2023/08/3988284.jpg">
        <div class="banner-text">
            <div>Benvenuto nel database dei film</div>
                <a href="/movies">
                <button class="banner-button">Vai al database</button>
            </a>
        </div>
    </div>

    <div class="hero-container">
        <h1 class="hero-title">Lorem ipsum</h1>
        <div class="hero-text">
            {{ the_content() }}
        </div>
    </div>

    @php
        $campo_immagine_singola = get_field('immagine_singola');
        $immagine_singola = $campo_immagine_singola[0];
    @endphp

    <div class="image-with-text">
        <img src="{{ $immagine_singola['url'] }}" >
        <div class="image-text-container">
            <h1 class="image-title">{{ $immagine_singola['titolo'] }}</h1>
            <div>{{ $immagine_singola['testo_a_lato'] }}</div>

            @if($immagine_singola['bottone'])
                <button class="image-button">{{ $immagine_singola['bottone'] }}</button>
            @endif

        </div>
    </div>
@endsection
