@extends('layouts.app')

@section('title', $article->title)

@section('content')

        <div class="card-deck">
                <div class="card">
                    <div class="card-body">
                        {{ $article->content }}
                    </div>
             </div>
        </div>
        <a href="/">Back</a>

@endsection