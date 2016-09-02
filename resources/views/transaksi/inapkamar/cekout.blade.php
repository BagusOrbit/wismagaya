@extends('dashboard')

@section('title') Cek Out Kamar / Menginap@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($inapdetail, ['class' => 'form-horizontal']) !!}
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Apakah yakin Cek Out kamar?</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('tglcheckin', 'Tgl Cek In', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $inapdetail->tglcheckin }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('tglcheckout', 'Tgl Cek Out', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $inapdetail->tglcheckout }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('noroom', 'No Kamar', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $inapdetail->noroom }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('Jumlahhari', 'Jumlah Hari', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $inapdetail->Jumlahhari }}}
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        {!! Form::label('tglcheckin', 'Tgl Cek In', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-4">
                            {!! Form::text('tglcheckin', $inapdetail->tglcheckin, ['class' => 'form-control datepicker','disabled'=>'disabled',]) !!}
                        </div>
                        {!! Form::label('tglcheckout', 'Tgl Cek Out', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-4">
                            {!! Form::text('tglcheckout', $inapdetail->tglcheckout, ['class' => 'form-control datepicker', 'disabled' => 'disabled',]) !!}
                        </div>
                    </div>
        
                    <div class="form-group">
                        {!! Form::label('noroom', 'No Kamar', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-4">
                            {!! Form::text('noroom', $inapdetail->noroom, ['class' => 'form-control', 'placeholder' => 'Kamar','id' => 'state']) !!}
                        </div>
                        {!! Form::label('Jumlahhari', 'Hari', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-4">
                            {!! Form::text('Jumlahhari',$inapdetail->Jumlahhari, ['class' => 'form-control', 'placeholder' => 'Jumlah Hari']) !!}
                        </div>
                    
                    </div> -->
                    
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn btn-flat btn-primary" type="submit">Cek Out</button>
                            <a href="{{ url('/inapkamar/bayar',$inap->id) }}" class="btn btn-flat btn-default">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection