@extends('admin.default.home')
@section('css')
@endsection
@section('content')
    <div class="visible-print text-center">
        {!! QrCode::size(100)->color(255,0,255)->generate(Request::url()) !!}
    </div>
@endsection