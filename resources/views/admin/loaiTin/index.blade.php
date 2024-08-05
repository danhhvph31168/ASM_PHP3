@extends('admin.layouts.master')

@section('title')
    Danh sách loại tin
@endsection

@section('content')
    <a href="{{ route('tin.index') }}" class="btn btn-warning mb-3">Danh sách tin</a>
    <a href="{{ route('loaiTin.create') }}" class="btn btn-info">Thêm mới</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('loaiTin.edit', $item->id) }}" class="btn btn-warning">Sửa</a>
                        <a href="{{ route('loaiTin.show', $item->id) }}" class="btn btn-info">Show</a>
                        <form action="{{ route('loaiTin.destroy', $item->id) }}" method="post">
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
