@extends('admin.layouts.master')

@section('title')
    Edit Post
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('posts.update', $model) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror " name="title" placeholder="name"
                value="{{ $model->title }}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Body</label>
            <textarea name="body" class="form-control @error('body') is-invalid @enderror " cols="30" rows="5">{{ $model->body }}</textarea>
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-danger" href="{{ route('posts.index') }}">Back</a>
    </form>
@endsection
