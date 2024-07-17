@extends('admin.layouts.master')

@section('title')
    Sửa loại tin
@endsection

@section('content')
    <form action="{{ route('loaiTin.update', $model) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">ID</label>
            <input type="text" class="form-control" disabled value="{{ $model->id }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $model->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
