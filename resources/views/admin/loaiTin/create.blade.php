@extends('admin.layouts.master')

@section('title')
    Thêm mới loại tin
@endsection

@section('content')
    <form action="{{ route('loaiTin.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">ID</label>
            <input type="text" class="form-control" disabled>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" placeholder="name">
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
