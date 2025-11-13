@extends('layouts.app')

@section('header')
    @include('partials._header')
@endsection

@section('content')
    @include('authentication.login')
@endsection


@section('footer')
    @include('partials._footer')
@endsection
