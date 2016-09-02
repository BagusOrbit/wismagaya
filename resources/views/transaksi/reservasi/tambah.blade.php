@extends('dashboard')

@section('title')
    Tambah Pemesanan Kamar
@endsection

@section('content')
    {!! Form::open(['class' => 'form-horizontal']) !!}
    @include('transaksi.reservasi.form')
    {!! Form::close() !!}
@endsection