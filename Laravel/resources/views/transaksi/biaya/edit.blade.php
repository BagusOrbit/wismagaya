@extends('dashboard')

@section('title')
    Edit Biaya
@endsection

@section('content')
    {!! Form::model($biaya, ['class' => 'form-horizontal']) !!}
        @include('transaksi.biaya.form')
    {!! Form::close() !!}
@endsection