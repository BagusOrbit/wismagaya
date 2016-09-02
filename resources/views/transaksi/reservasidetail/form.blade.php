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
        <hr>
        

        <div class="form-group">

            {!! Form::label('tglcheckin', 'Tgl Cek In', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('tglcheckin', null, ['class' => 'form-control datepicker', 'placeholder' => 'Tgl Cek In',]) !!}
            </div>
            {!! Form::label('tglcheckout', 'Tgl Cek Out', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('tglcheckout', null, ['class' => 'form-control datepicker', 'placeholder' => 'Tgl Cek Out',]) !!}
            </div>
        </div>
        
        <div class="form-group">
            {!! Form::label('idroom', 'Kamar', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::select('idroom', $room,null, ['class' => 'form-control', 'placeholder' => 'Kamar','id' => 'state']) !!}
            </div>
            {!! Form::label('Jumlahhari', 'Hari', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('Jumlahhari',null, ['class' => 'form-control', 'placeholder' => 'Jumlah Hari']) !!}
            </div>
        
        </div>
    
        <div class="form-group">
            <div class="col-md-offset-2 col-md-4">
                <button class="btn btn-flat btn-primary" type="submit">Simpan</button>
                <a href="{{ url('/reservasi') }}" class="btn btn-flat btn-default">Batal</a>
            </div>
        </div>
        @if (count($reservasidetail) > 0)
        <div class="box-body table-responsive no-padding">
            <table class="table table-condensed table-bordered table-hover table-striped">
                <tbody>
                <tr>
                    <th>No</th>
                    <th>No Kamar</th>
                    <th>Tanggal Cek In</th>
                    <th>Tgl Cek Out</th>
                    <th>Jumlah (Hari)</th>
                    <th style="min-width: 150px;width: 150px"></th>
                    
                </tr>
                <?php $no = 1 ; ?>
                @forelse($reservasidetail as $key => $u)

                    <tr>
                        <td>{!! $no++ !!}</td>
                        <td>{!! $u->noroom !!}</td>
                        <td>{!! $u->tglcheckin !!}</td>
                        <td>{!! $u->tglcheckout !!}</td>
                        <td>{!! $u->Jumlahhari !!}</td>
                        <td>                        
                        <a href="{{ url('reservasidetail/hapus', ['id' => $u->idpemesanandetail]) }}" class="btn btn-flat btn-sm btn-danger"><i class="fa fa-remove"></i> Hapus</a>
                        </td>
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
        @endif
    </div>
</div>