@extends('layouts.app')
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
    <div class="image-with-text"> <!-- CHECK ACF -->
        <img src="/app/uploads/2023/08/20200113_stalkerfilm5.jpg" >
        <div class="image-text-container">
            <h1 class="image-title">Lorem ipsum</h1>
            <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
            <button class="image-button">Bottone</button>
        </div>
    </div>
@endsection