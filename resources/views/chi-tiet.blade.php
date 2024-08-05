@extends('layouts.master')
@section('title')
    {{ $data->tieuDe }}
@endsection

@section('content')
    <img src="{{ $data->anh }}" height="400px" alt="">
    <p class="fs-4 mt-3">{{ $data->noiDung }}</p>
    <b>Đăng ngày: {{ $data->created_at }}</b>
    <b>Lượt xem: {{ $data->luotXem }}</b>
@endsection
