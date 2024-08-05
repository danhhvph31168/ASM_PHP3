@extends('admin.layouts.master')

@section('title')
    Sửa mới tin
@endsection

@section('content')
    <form action="{{ route('tin.update', $model) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control" name="tieuDe" value="{{ $model->tieuDe }}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Loại tin</label>
            <select name="loai_tin_id" class="form-control">
                @foreach ($loaiTin as $item)
                    <option @selected($model->loaiTin->id == $item->id) value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Ảnh</label>
            <input type="file" class="form-control" name="anh">
            @if (!\Str::contains($model->anh, 'http'))
                <img src="{{ \Storage::url($model->anh) }}" width="100px" alt="">
            @else
                <img src="{{ $model->anh }}" width="100px" alt="">
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Nội dung</label>
            <textarea name="noiDung" class="form-control" rows="3">{{ $model->noiDung }}</textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Lượt xem</label>
            <input type="number" class="form-control" name="luotXem" value="{{ $model->luotXem }}">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection
