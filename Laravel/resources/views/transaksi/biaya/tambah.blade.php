@extends('dashboard')

@section('title')
    Tambah Biaya - Biaya
@endsection

@section('content')
    {!! Form::open(['class' => 'form-horizontal']) !!}
    @include('transaksi.biaya.form')
    {!! Form::close() !!}
@endsection