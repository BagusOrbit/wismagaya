@extends('dashboard')

@section('title') Hapus Data Tambahan Kamar / Menginap@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($inaptambahan, ['class' => 'form-horizontal']) !!}
            <div class="box box-solid box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Apakah yakin menghapus data tambahan kamar / Menginap?</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        {!! Form::label('namatambahan', 'Nama', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ $inaptambahan->namatambahan }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('qty', 'Jumlah', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ number_format($inaptambahan->qty,0) }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('harga', 'Harga', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ number_format($inaptambahan->harga,0) }}}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('subtotal', 'Total', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {{{ number_format($inaptambahan->subtotal,0) }}}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn btn-flat btn-primary" type="submit">Hapus</button>
                            <a href="{{ url('/inapkamar/tambahdetail',$inap->id) }}" class="btn btn-flat btn-default">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection