@extends('dashboard')

@section('title')
@include('flash::message')
Data Ketersediaan Kamar
<div class="pull-right">
    <a href="{{ url('reservasi/tambah') }}" class="btn btn-flat btn-sm btn-primary"><i class="fa fa-plus"></i> Pesan Kamar</a>
</div>
@endsection

@section('content')

<div class="box">
        {!! Form::open(['class' => 'form-horizontal']) !!}
        <div class="box-body table-responsive">
                <div class="col-md-0" align="right">
                {!! Form::label('tglcheckin', 'Cek In', ['class' => 'control-label col-md-2']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::text('tglcheckin', null, ['class' => 'form-control datepicker', 'placeholder' => 'Tgl Cek In',]) !!}
                </div>   
                <div class="col-md-0" align="right">
                {!! Form::label('tglcheckout', 'Cek Out', ['class' => 'control-label col-md-2']) !!}
                </div>
                <div class="col-md-3">
                    {!! Form::text('tglcheckout', null, ['class' => 'form-control datepicker', 'placeholder' => 'Tgl Cek Out',]) !!}
                </div>    
                <button class="btn btn-flat btn-primary" type="submit">Cek</button>                
        </div>
         {!! Form::close() !!}
         @if($awal != "")
            <h5>Periode {!! $awal !!} s/d {!! $akhir !!}</h5>
        @endif
            <table class="table table-condensed table-bordered table-hover table-striped">
                <tbody>
                <tr>
                    
                    <th>No</th>
                    <th>No Kamar / Room</th>
                    <th>Nama Kamar / Room</th>
                    <th>Fasilitas</th>
                    <th>Harga</th>
                </tr>
                <?php $no = 1; ?>
                @forelse($room as $key => $u)
                    <tr>
                        
                        <td>{!! $no++ !!}</td>
                        <td>{!! $u->noroom !!}</td>
                        <td>{!! $u->namaroom !!}</td>
                        <td>{!! $u->fasilitas !!}</td>
                        <td>{!! number_format($u->harga,0) !!}</td>
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

@endsection