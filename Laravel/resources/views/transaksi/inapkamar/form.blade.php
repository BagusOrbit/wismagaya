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
                    <th>Sewa Perhari</th>                    
                    <th>SubTotal</th>
                </tr>
                <?php $no = 1 ; ?>
                @forelse($reservasidetail as $key => $u)

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
                    <th  align="right"> {!! number_format($reservasidetail->sum('subtotal'),0) !!}</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
        @endif
       <?php
        $pajak = (($reservasidetail->sum('subtotal') * 10) / 100);

        $totalsemua = $reservasidetail->sum('subtotal') + $pajak;
        // dd($totalsemua);
        // exit();
       ?>
         <div class="form-group">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                {!! Form::label('pajaknominal', 'Pajak', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                {!! Form::text('pajaknominal',$ , ['class' => 'form-control']) !!}
                </div>
            </div>
            
            
        </div>
        <div class="form-group">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                {!! Form::label('potongannominal', 'Pot', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                {!! Form::text('potongannominal',0, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                {!! Form::label('biayalain', 'Biaya', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                {!! Form::text('biayalain',0, ['class' => 'form-control']) !!}
                </div>
            </div>            
        </div>
        <div class="form-group">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <!-- {!! Form::label('totalakhir', 'T.Akhir', ['class' => 'control-label col-md-2']) !!} -->
                <div class="col-md-10">
                
                <!-- {!! Form::text('totalsemua',null, ['class' => 'form-control']) !!} -->
                </div>
            </div>            
        </div>

        <div class="form-group">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            
            <div class="col-md-4">
                {!! Form::label('totalsemua', 'T.Akhir', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                {!! Form::hidden('totalakhir',$reservasidetail->sum('subtotal'), ['class' => 'form-control']) !!}
                {!! Form::text('totalsemua',$totalsemua, ['class' => 'form-control','readonly' => 'readonly']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            
            <div class="col-md-4">
                {!! Form::label('dp', 'DP', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                {!! Form::text('dp',0, ['class' => 'form-control']) !!}
                </div>
            </div>
        </div>
        

        <div class="form-group">
            <div class="col-md-4">
                <button class="btn btn-flat btn-primary" type="submit">Menginap</button>
                <a href="{{ url('/reservasi') }}" class="btn btn-flat btn-default">Batal</a>
            </div>
        </div>
    </div>
</div>
