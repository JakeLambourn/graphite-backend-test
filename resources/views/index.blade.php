@extends('layouts.app')

@section('title', 'Articles')

@section('content')

@if (count($articles))


<div class="card-deck">

<?php $count = 0;?>

@foreach($articles as $article)

    @if ($count == 3)

    

    @endif

    <a href="{{ route('article', $article) }}" class="card">
        <div class="card-body">
            <h2>{{ $article->title }}</h2>
            {{ str_limit($article->content, $limit = 150, $end = '...') }}
        </div>

    </a>

    <?php $count++;?>

    @if($count == 3)
        <?php $count = 0;?>

        </div>

        <div class="card-deck">

    @endif

@endforeach


@else
    <p>There are no articles to display</p>
@endif




@endsection