@extends('admin.layouts.master')

@section('title')
    Thêm mới tin
@endsection

@section('content')
    <form action="{{ route('tin.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">ID</label>
            <input type="text" class="form-control" disabled>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" name="tieude">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
