@extends('admin.default.home')
@section('css')
@endsection
@section('content')
    <div class="visible-print text-center">
        {!! QrCode::size(100)->generate(Request::url()) !!}
    </div>
@endsection