@extends('dashboard')

@section('title')
    Tambah Kamar
@endsection

@section('content')
    {!! Form::open(['class' => 'form-horizontal']) !!}
    @include('master.room.form')
    {!! Form::close() !!}
@endsection