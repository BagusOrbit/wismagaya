@extends('dashboard')

@section('title') Hapus Data Tipe kamar @endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($typeroom, ['class' => 'form-horizontal']) !!}
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Apakah yakin menghapus data tipe kamar?</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('namatyperoom', 'Tipe Kamar', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $typeroom->namatyperoom }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Harga', 'Harga', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $typeroom->Harga }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Fasilitas', 'Fasilitas', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $typeroom->Fasilitas }}}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn btn-flat btn-primary" type="submit">Hapus</button>
                            <a href="{{ url('/typeroom') }}" class="btn btn-flat btn-default">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection