@extends('dashboard')

@section('title') Hapus Data Kamar@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($room, ['class' => 'form-horizontal']) !!}
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Apakah yakin menghapus data kamar?</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('noroom', 'Nomor Kamar', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $room->noroom }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('namaroom', 'Nama Kamar', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $room->namaroom }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('harga', 'Harga', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $room->harga }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('fasilitas', 'Fasilitas', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $room->fasilitas }}}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn btn-flat btn-primary" type="submit">Hapus</button>
                            <a href="{{ url('/room') }}" class="btn btn-flat btn-default">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection