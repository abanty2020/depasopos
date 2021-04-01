@extends('adminlte::page')

@section('title', 'POS') 

@section('content_header')

    @include('contenido.titleheader')

@stop

@section('content')

    @include('contenido.contenido')

@stop

@section('css')
    <link rel="stylesheet" href="vendor/adminlte/dist/css/adminlte.css">
@stop

@section('js')
    <script src="{{ asset('js/app.js') }}" defer></script>
{{-- <script src="../js/app.js"></script> --}}
@stop
