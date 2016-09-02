@extends('dashboard')

@section('title')
    Edit Reservasi Kamar
@endsection

@section('content')
    {!! Form::model($reservasi, ['class' => 'form-horizontal']) !!}
        @include('transaksi.reservasi.form')
    {!! Form::close() !!}
@endsection