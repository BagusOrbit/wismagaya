@extends('dashboard')

@section('title')
@include('flash::message')
    Detail Kamar
@endsection

@section('content')
    {!! Form::open(['class' => 'form-horizontal']) !!}
    <div class="box box-primary">
    <div class="box-body">
    @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif       
        
            <div class="box">
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
        <hr>
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
                    <th>Status</th>
                    <th style="min-width: 100px;width: 100px"></th>
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
                        <td>{!! $u->cekout !!}</td>
                        <td>
                            
                            <a href="{{ url('inapkamar/editdetail', ['id' => $u->idpemesanandetail]) }}" class="btn btn-flat btn-sm btn-info"><i class="fa fa-edit"></i> Edit</a>
                        </td>
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
        <div class="form-group">
            <div class="col-md-10">
                <a href="{{ url('/inapkamar') }}" class="btn btn-flat btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
    {!! Form::close() !!}
@endsection
