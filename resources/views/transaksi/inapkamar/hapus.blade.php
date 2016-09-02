@extends('dashboard')

@section('title') Hapus Data Menginap / Menginap@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($inap, ['class' => 'form-horizontal']) !!}
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Apakah yakin menghapus data Menginap?</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <div class="form-group">
                        {!! Form::label('nopesanan', 'No Pemesanan', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $inap->nopesanan }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('namapesanan', 'Nama Pemesanan', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $inap->namapesanan }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('noidentitas', 'KTP/SIM', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $inap->noidentitas }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('alamat', 'alamat', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $inap->alamat }}}
                        </div>
                    </div>
                    
                    
                </div>
                @if (count($inapdetail) > 0)
        <h3>Data Detail Kamar</h3>
        <div class="box-body table-responsive no-padding">
            <table class="table table-condensed table-bordered table-hover table-striped">
                <tbody>
                <tr>
                    <th>No</th>
                    <th>No Kamar</th>
                    <th>Tanggal Cek In</th>
                    <th>Tgl Cek Out</th>
                    <th>Jumlah (Hari)</th>
                    <th>Sewa Perhari</th>                    
                    <th>SubTotal</th>
                    
                </tr>
                <?php $no = 1 ; ?>
                @forelse($inapdetail as $key => $u)

                    <tr>
                        <td>{!! $no++ !!}</td>
                        <td>{!! $u->noroom !!}</td>
                        <td>{!! $u->tglcheckin !!}</td>
                        <td>{!! $u->tglcheckout !!}</td>
                        <td>{!! $u->Jumlahhari !!}</td>
                        <td>{!! number_format($u->sewaperhari,0) !!}</td>
                        <td>{!! number_format($u->subtotal,0) !!}</td>
                        
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" >Tidak ada data</td>
                    </tr>
                @endforelse
                <tr>
                    <th colspan="6">TOTAL :</th>
                    <th  align="right"> {!! number_format($inapdetail->sum('subtotal'),0) !!}</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
        @endif
        <hr>
        @if (count($inaptambahan) > 0)
        <h3>Data Tambahan</h3>
        <div class="box-body table-responsive no-padding">
            <table class="table table-condensed table-bordered table-hover table-striped">
                <tbody>
                <tr>
                    <th>No</th>
                    <th>Tambahan</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>SubTotal</th>
                    
                </tr>
                <?php $no = 1 ; ?>
                @forelse($inaptambahan as $key => $u)

                    <tr>
                        <td>{!! $no++ !!}</td>
                        <td>{!! $u->namatambahan !!}</td>
                        <td>{!! number_format($u->qty,0) !!}</td>
                        <td>{!! number_format($u->harga,0) !!}</td>
                        <td>{!! number_format($u->subtotal,0) !!}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada data</td>
                    </tr>
                @endforelse
                <tr>
                    <th colspan="5">TOTAL :</th>
                    <th  align="right"> {!! number_format($inaptambahan->sum('subtotal'),0) !!}</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
        @endif
                <div class="form-group">
                    <div class="col-md-10">
                        <button class="btn btn-flat btn-primary" type="submit">Hapus</button>
                        <a href="{{ url('/inapkamar') }}" class="btn btn-flat btn-default">Batal</a>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection