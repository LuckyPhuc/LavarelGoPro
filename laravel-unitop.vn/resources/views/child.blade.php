@extends('layouts.app')

@section('title', 'Tiêu đề trang child')

@section('content')
    <p>Nội dung trang con</p>
    {{-- @foreach ($collection as $item)
        Họ và tên : {{ $item['name'] }} <br>
        Lớp : {{ $item['grade'] }} <br>
        Tuổi : {{ $item['old'] }} <br>
    @endforeach --}}
    {{-- @php
    foreach ($variable as $key => $value) {
        # code...
    }
    @endphp --}}
    @include('demo.test')
@endsection

@section('sidebar')
    <p>Đây là side Bar</p>
@endsection
