@extends('dashboard')

@section('title') Hapus Data Biaya@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($biaya, ['class' => 'form-horizontal']) !!}
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Apakah yakin menghapus data biaya?</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <div class="form-group">
                        {!! Form::label('tanggal', 'Tanggal', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $biaya->tanggal }}}
                        </div>
                    </div>
                        {!! Form::label('nama', 'Nama', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $biaya->nama }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('nominal', 'Nominal', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ number_format($biaya->nominal,0) }}}
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn btn-flat btn-primary" type="submit">Hapus</button>
                            <a href="{{ url('/biaya') }}" class="btn btn-flat btn-default">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection