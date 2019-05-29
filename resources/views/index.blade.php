@extends('layouts.app')

@section('title', 'Articles')

@section('content')

    @if (count($articles))
        <div class="card-deck">
            @foreach($articles as $article)
                <div class="card">
                    <div class="card-body">
                        <h2>{{ $article->title }}</h2>
                        {{ $article->content }}
                    </div>
             </div>
            @endforeach
        </div>
    @else
        <p>There are no articles to display</p>
    @endif

@endsection