@extends('admin.layouts.master')

@section('title')
    Thêm mới tin
@endsection

@section('content')
    <form action="{{ route('tin.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" name="tieuDe">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Loại tin</label>
            <select name="loai_tin_id" class="form-control">
                @foreach ($loaiTin as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="anh">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nội dung</label>
            <textarea name="noiDung" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Lượt xem</label>
            <input type="number" class="form-control" name="luotXem">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
