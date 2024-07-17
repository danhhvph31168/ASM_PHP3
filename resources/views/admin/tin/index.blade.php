@extends('admin.layouts.master')

@section('title')
    Danh sách tin
@endsection

@section('content')
    <a href="{{ route('tin.create') }}" class="btn btn-info">Thêm mới</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Loại tin</th>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Lượt xem</th>
                <th>Ngày đăng</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->loaiTin->name }}</td>
                    <td>{{ $item->tieuDe }}</td>
                    <td>
                        <img src="{{ $item->anh }}" width="100px" alt="">
                    </td>
                    <td>{{ $item->luotXem }}</td>
                    <td>{{ $item->ngayDang }}</td>
                    <td>{{ $item->created_at }}</td>
                    <td>{{ $item->updated_at }}</td>
                    <td>
                        <a href="{{ route('tin.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ route('tin.show', $item->id) }}" class="btn btn-info">Show</a>
                        <form action="{{ route('tin.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Chắc chắn xóa')"
                            class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
