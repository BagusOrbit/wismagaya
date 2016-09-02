@extends('dashboard')

@section('title')
    Edit Kamar
@endsection

@section('content')
    {!! Form::model($room, ['class' => 'form-horizontal']) !!}
        @include('master.room.form')
    {!! Form::close() !!}
@endsection