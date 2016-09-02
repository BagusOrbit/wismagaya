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
        <div class="form-group">

            {!! Form::label('nopesanan', 'Nomor', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('nopesanan', null, ['class' => 'form-control', 'placeholder' => 'Nomor Pemesanan']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('namapesanan', 'Nama', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('namapesanan',null, ['class' => 'form-control', 'placeholder' => 'Nama Pemesan']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('alamat', 'Alamat', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::textarea('alamat', null, ['class' => 'form-control', 'placeholder' => 'Alamat']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('notelp', 'Telp/Hp', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('notelp',null, ['class' => 'form-control', 'placeholder' => 'No Telp / Hp']) !!}
            </div>
        </div>
        <div class="form-group">
            {!! Form::label('noidentitas', 'KTP/SIM', ['class' => 'control-label col-md-2']) !!}
            <div class="col-md-4">
                {!! Form::text('noidentitas',null, ['class' => 'form-control', 'placeholder' => 'No KTP / SIM']) !!}
            </div>
        </div>
    
        <div class="form-group">
            <div class="col-md-offset-2 col-md-4">
                <button class="btn btn-flat btn-primary" type="submit">Simpan</button>
                <a href="{{ url('/reservasi') }}" class="btn btn-flat btn-default">Batal</a>
            </div>
        </div>
        @if (count($reservasidetail) > 0)
            <div class="box">
        
        <div class="box-body table-responsive no-padding">
            <table class="table table-condensed table-bordered table-hover table-striped">
                <tbody>
                <tr>
                    <th>No</th>
                    <th>No Kamar</th>
                    <th>Tanggal Cek In</th>
                    <th>Tgl Cek Out</th>
                    <th>Jumlah (Hari)</th>
                    
                </tr>
                <?php $no = 1 ; ?>
                @forelse($reservasidetail as $key => $u)

                    <tr>
                        <td>{!! $no++ !!}</td>
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
        @endif
    </div>
</div>