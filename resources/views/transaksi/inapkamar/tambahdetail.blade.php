@extends('dashboard')

@section('title')
    Tambah Detail
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
                            {!! $reservasi->nopesanan !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('namapesanan', 'Nama Pemesanan', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {!! $reservasi->namapesanan !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('noidentitas', 'KTP/SIM', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {!! $reservasi->noidentitas !!}
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('alamat', 'alamat', ['class' => 'control-label col-md-2']) !!}
                        <div class="col-md-8 form-control-static">
                            {!! $reservasi->alamat !!}
                        </div>
                    </div>
        <hr>
        <div class="form-group">
            {!! Form::label('namatambahan', 'Nama', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('namatambahan', null, ['class' => 'form-control', 'placeholder' => 'Nama Tambahan']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('qty', 'Jumlah', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('qty',null, ['class' => 'form-control', 'placeholder' => 'Jumlah']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('harga', 'Harga', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('harga',null, ['class' => 'form-control', 'placeholder' => 'Harga Satuan']) !!}
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
                <button class="btn btn-flat btn-primary" type="submit">Simpan</button>
                <a href="{{ url('/inapkamar') }}" class="btn btn-flat btn-default">Batal</a>
            </div>
        </div>
        @if (count($inaptambahan) > 0)
        <div class="box-body table-responsive no-padding">
            <table class="table table-condensed table-bordered table-hover table-striped">
                <tbody>
                <tr>
                    <th>No</th>
                    <th>Tambahan</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>SubTotal</th>
                    <th style="min-width: 150px;width: 150px"></th>
                    
                </tr>
                <?php $no = 1 ; ?>
                @forelse($inaptambahan as $key => $u)

                    <tr>
                        <td>{!! $no++ !!}</td>
                        <td>{!! $u->namatambahan !!}</td>
                        <td>{!! number_format($u->qty,0) !!}</td>
                        <td>{!! number_format($u->harga,0) !!}</td>
                        <td>{!! number_format($u->subtotal,0) !!}</td>
                        <td>                        
                        <a href="{{ url('inapkamar/hapustambahan', ['id' => $u->id]) }}" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-remove"></i> Hapus</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada data</td>
                    </tr>
                @endforelse
                <tr>
                    <th colspan="4">TOTAL :</th>
                    <th  align="right"> {!! number_format($inaptambahan->sum('subtotal'),0) !!}</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
        @endif
        
        
    </div>
</div>

    {!! Form::close() !!}
@endsection