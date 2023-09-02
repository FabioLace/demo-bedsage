@extends('layouts.app')
@section('content')

@php($registi = get_terms('registi'))

    <div class="archive-container">
        <h1>Tutti i registi</h1>
        <div class="director-grid">
            @foreach($registi as $regista)
                <div class="director-container">
                    <a href="{{ get_term_link($regista->term_id) }}">
                        <img class="ritratto" src="{{ get_field('foto','term_'. $regista->term_id) }}" alt="{{ $regista->name }}">
                    </a>
                    <a href="{{ get_term_link($regista->term_id) }}">{{ $regista->name }}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection