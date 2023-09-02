@extends('layouts.app')
@section('content')

    {{-- @php
        $movie = get_post();
        $terms = get_the_terms($movie->ID,'registi');
        $regista = $terms[0]->name;
        $immagini_dal_film = get_field('immagini_dal_film',$movie->ID);
    @endphp --}}

   {{--  <div class="scheda-film">
        <img class="locandina" src="{{ the_field('locandina') }}">
        <div class="info-film">
            <div class="title">{{ the_title() }}</div>
            <ul>
                @if(get_field('titolo_originale'))
                    <li>Titolo originale: {{ the_field('titolo_originale') }} </li>
                @endif

                @if(isset($regista))
                    <li>Regista: {{ $regista }}</li>
                @endif
                
                @if(get_field('anno'))
                    <li>Anno: {{ the_field('anno') }} </li>
                @endif

                @if(get_field('paese'))
                    <li>Paese: {{ the_field('paese') }} </li>
                @endif

                @if(get_field('durata'))
                    <li>Durata (min): {{ the_field('durata') }}</li>
                @endif
                
                @if(get_field('casa_di_produzione'))
                    <li>Casa di produzione: {{ the_field('casa_di_produzione') }}</li>
                @endif

                @if(get_field('distributore'))
                    <li>Distributore: {{ the_field('distributore') }}</li>
                @endif
            </ul>
        </div>
    </div> --}}
    
    <div class="descrizione-film">
        {{ the_content() }}
    </div>

    {{-- @if($immagini_dal_film)
        <div class="container-immagini-dal-film">
            <h1>Immagini dal film</h1>
            <div class="immagini-film">
                @foreach($immagini_dal_film as $immagine)
                    <img src="{{ $immagine['url'] }}">
                @endforeach
            </div>
        </div>
    @endif --}}
@endsection
