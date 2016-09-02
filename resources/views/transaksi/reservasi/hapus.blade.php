@extends('dashboard')

@section('title') Hapus Data Reservasi Kamar@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($reservasi, ['class' => 'form-horizontal']) !!}
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Apakah yakin menghapus data reservasi kamar?</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('nopesanan', 'No Pemesanan', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $reservasi->nopesanan }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('namapesanan', 'Nama Pemesanan', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $reservasi->namapesanan }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('noidentitas', 'KTP/SIM', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $reservasi->noidentitas }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('alamat', 'alamat', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $reservasi->alamat }}}
                        </div>
                    </div>

    <div class="box">
        
        <div class="box-body table-responsive no-padding">
            <table class="table table-condensed table-bordered table-hover table-striped">
                <tbody>
                <tr>
                    <th>No</th>
                    <th>Nota</th>
                    <th>No Kamar</th>
                    <th>Tanggal Cek In</th>
                    <th>Tgl Cek Out</th>
                    <th>Jumlah (Hari)</th>
                    
                </tr>
                <?php $no = 1 ; ?>
                @forelse($reservasidetail as $key => $u)

                    <tr>
                        <td>{!! $no++ !!}</td>
                        <td>{!! $u->nota !!}</td>
                        <td>{!! $u->noroom !!}</td>
                        <td>{!! $u->tglcheckin !!}</td>
                        <td>{!! $u->tglcheckout !!}</td>
                        <td>{!! $u->Jumlahhari !!}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">Tidak ada data</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
                    
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn btn-flat btn-primary" type="submit">Hapus</button>
                            <a href="{{ url('/reservasi') }}" class="btn btn-flat btn-default">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection