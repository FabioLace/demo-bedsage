@extends('layouts.app')
@section('content')
    @php
        $regista = get_queried_object();

        $ritratto = get_field('foto','term_'. $regista->term_id);        
        $film_regista = new WP_Query(array(
            'post_type' => 'movie',
            'tax_query' => array(
                array(
                    'taxonomy' => 'registi',
                    'field' => 'term_id',
                    'terms' => $regista->term_id,
                ),
            ),
        ));
    @endphp

    <div class="scheda-regista">
        <img class="ritratto" src=" {{ $ritratto }}" >
        <div class="nome">{{ $regista->name }}</div>
        <div class="descrizione">{{ $regista->description}}</div>
    </div>
    <div class="archive-container">
        <h1>Film diretti</h1>
        @if($film_regista->post_count >=2)
            <div class="movie-grid">
                @while ($film_regista->have_posts())
                    @php
                        $film_regista->the_post();
                    @endphp
                    <div class="movie-container">
                            <a href="{{ the_permalink() }}"><img class="locandina" src="{{ the_field('locandina') }}">
                            <a href="{{ the_permalink() }}">{{ the_title() }}</a>
                        </div>
                @endwhile
            </div>
        @else
            <div class="movie-container">
                <a href="{{ the_permalink() }}"><img class="locandina" src="{{ the_field('locandina') }}">
                <a href="{{ the_permalink() }}">{{ the_title() }}</a>
                </div>
        @endif
    </div>
@endsection