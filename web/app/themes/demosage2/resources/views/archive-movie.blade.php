@extends('layouts.app')

@section('content')
    <div class="archive-container">
        <h1>Tutti i film</h1>
        <div class="movie-grid">
            @if(have_posts())
                @while (have_posts()) @php(the_post())
                    <div class="movie-container">
                        <a href="{{ the_permalink() }}">
                            <img class="locandina" src="{{ the_field('locandina') }}">
                        </a>
                        <a href="{{ the_permalink() }}">{{ the_title() }}</a>
                    </div>
                @endwhile
            @endif
        </div>
    </div>
@endsection