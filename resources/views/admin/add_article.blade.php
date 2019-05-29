@extends('layouts.app')

@section('title', 'Add article')

@section('content')

    <form method="POST" action="{{ route('admin_add') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Article title here" required="required">
        </div>
        <div class="form-group">
            <label for="content">Article content</label>
            <textarea name="content" id="content" class="form-control" placeholder="Enter your article content here. You can use HTML if you want" rows="10"></textarea>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="published" id="published">
            <label for="published" class="form-check-label">Published</label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>

@endsection