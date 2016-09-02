@extends('dashboard')

@section('title')
@include('flash::message')
    Tambah Detail Pemesanan Kamar
@endsection

@section('content')
    {!! Form::open(['class' => 'form-horizontal']) !!}
    @include('transaksi.reservasidetail.form')
    {!! Form::close() !!}
@endsection
