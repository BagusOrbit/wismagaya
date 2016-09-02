@extends('dashboard')

@section('title')
    Tambah Tipe Kamar
@endsection

@section('content')
    {!! Form::open(['class' => 'form-horizontal']) !!}
    @include('master.typeroom.form')
    {!! Form::close() !!}
@endsection