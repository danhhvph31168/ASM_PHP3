@extends('admin.layouts.master')

@section('title')
    Chi tiết: {{ $model->title }}
@endsection

@section('content')
    <table class="table">
        <tr>
            <th>Trường</th>
            <th>Giá trị</th>
        </tr>
        @foreach ($model->toArray() as $key => $value)
            <tr>
                <td>{{ $key }}</td>
                <td>{{ $value }}</td>
            </tr>
        @endforeach
    </table>
    <a class="btn btn-danger" href="{{ route('posts.index') }}">Back</a>
@endsection
