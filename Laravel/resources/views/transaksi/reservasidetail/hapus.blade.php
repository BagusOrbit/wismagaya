@extends('dashboard')

@section('title') Hapus Data Detail Reservasi Kamar@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($reservasidetail, ['class' => 'form-horizontal']) !!}
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Apakah yakin menghapus data detail reservasi kamar?</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('nopesanan', 'No Pemesanan', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $reservasidetail->nopesanan }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('noroom', 'No Kamar', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $reservasidetail->noroom }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('tglcheckin', 'Tgl Cek In', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $reservasidetail->tglcheckin }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('tglcheckout', 'Tgl Cek Out', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $reservasidetail->tglcheckout }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Jumlahhari', 'Jumlah Hari', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $reservasidetail->Jumlahhari }}}
                        </div>
                    </div>
                    <div>
                        
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn btn-flat btn-primary" type="submit">Hapus</button>
                            <a href="{{ url('/reservasidetail/tambah',$reservasi->id) }}" class="btn btn-flat btn-default">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection