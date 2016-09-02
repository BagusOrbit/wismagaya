@extends('dashboard')

@section('title')
    Edit Tipe Kamar
@endsection

@section('content')
    {!! Form::model($typeroom, ['class' => 'form-horizontal']) !!}
        @include('master.typeroom.form')
    {!! Form::close() !!}
@endsection