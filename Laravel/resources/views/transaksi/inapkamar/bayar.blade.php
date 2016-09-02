@extends('dashboard')

@section('title')
    Pembayaran Tagihan
    @include('flash::message')
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
                            
                            <a href="{{ url('inapkamar/cekout', ['id' => $u->idpemesanandetail]) }}" class="btn btn-flat btn-sm btn-info"><i class="fa fa-edit"></i> Cek Out</a>
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
                    <th colspan="4">TOTAL :</th>
                    <th  align="right"> {!! number_format($inaptambahan->sum('subtotal'),0) !!}</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
        @endif

        <div class="form-group">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                {!! Form::label('pajaknominal', 'Pajak', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                {!! Form::text('pajaknominal',$inap->pajaknominal, ['class' => 'form-control']) !!}
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
                {!! Form::text('potongannominal',$inap->potongannominal, ['class' => 'form-control']) !!}
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
                {!! Form::text('biayalain',$inap->biayalain, ['class' => 'form-control']) !!}
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
                {!! Form::label('totalsemua', 'T.Akhir', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                {!! Form::hidden('totalakhir',$inapdetail->sum('subtotal') + $inaptambahan->sum('subtotal'), ['class' => 'form-control']) !!}
                {!! Form::text('totalsemua',$inap->total, ['class' => 'form-control','readonly' => 'readonly']) !!}
                </div>
            </div>
            
            <div class="col-md-4">
                {!! Form::label('bayar', 'J.Bayar', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                {!! Form::text('bayar',$inap->bayar, ['class' => 'form-control','readonly' => 'readonly']) !!}
                </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            </div>
                
            <div class="col-md-4">
                {!! Form::label('kekurangan', 'Kurang', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                {!! Form::text('kekurangan',$inap->total-$inap->bayar, ['class' => 'form-control','readonly' => 'readonly']) !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                {!! Form::label('tunai', 'Tunai', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                {!! Form::text('tunai',0, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-md-4">
                {!! Form::label('kembali', 'Kembali', ['class' => 'control-label col-md-2']) !!}
                <div class="col-md-10">
                {!! Form::text('kembali',0, ['class' => 'form-control','readonly' => 'readonly']) !!}
                </div>
            </div>            
        </div>

        <div class="form-group">
            <div class="col-md-4">
                <button class="btn btn-flat btn-primary" type="submit">Bayar</button>
                <a href="{{ url('/inapkamar') }}" class="btn btn-flat btn-default">Batal</a>
            </div>
        </div>
    </div>
</div>

    {!! Form::close() !!}
@endsection

@section('scripts')
    <script type="text/javascript">

        var total = $('#totalakhir').val();

        //pajak nominal
        $('#pajaknominal').on('input',function(e){
         var pajak = $('#pajaknominal').val();
         var sudahbayar = $('#bayar').val();
         var pot = $('#potongannominal').val();
         var biaya = $('#biayalain').val();
         var totalakhir = parseInt(biaya,10) + parseInt(total,10) + parseInt(pajak,10) - parseInt(pot,10);
         $('#totalsemua').val(totalakhir);
         $('#kekurangan').val(parseInt(totalakhir) - parseInt(sudahbayar));
        });
        $('#biayalain').on('input',function(e){
        //biaya lain
        var pajak = $('#pajaknominal').val();
        var sudahbayar = $('#bayar').val();
         var pot = $('#potongannominal').val();
         var biaya = $('#biayalain').val();
         var totalakhir = parseInt(biaya,10) + parseInt(total,10) + parseInt(pajak,10) - parseInt(pot,10);
         $('#totalsemua').val(totalakhir);
         $('#kekurangan').val(parseInt(totalakhir) - parseInt(sudahbayar));
        });
        $('#potongannominal').on('input',function(e){
        //Potongan Nominal
        var pajakbaru = (total - $('#potongannominal').val()) * 0.1;
        $('#pajaknominal').val(pajakbaru);
        var pajak = $('#pajaknominal').val();
        var sudahbayar = $('#bayar').val();
         var pot = $('#potongannominal').val();
         var biaya = $('#biayalain').val();
         var totalakhir = parseInt(biaya,10) + parseInt(total,10) + parseInt(pajakbaru,10) - parseInt(pot,10);
         $('#totalsemua').val(totalakhir);
         $('#kekurangan').val(parseInt(totalakhir) - parseInt(sudahbayar));
        });
        $('#tunai').on('input',function(e){
        //Potongan Nominal
        var tunai = $('#tunai').val();
        var kekurangan = $('#kekurangan').val();
        var kekuranganbaru = $('#totalsemua').val() - tunai;
        if (kekuranganbaru > 0) 
            {
                $('#kekurangan').val(kekuranganbaru);

            };
         var kembalian = parseInt(tunai) - parseInt(kekurangan,10);
         
         if (kembalian > 0) 
            {
                $('#kembali').val(kembalian);       
                $('#kekurangan').val(0);
            }
            else
            {
                $('#kembali').val(0);
                
            };
         
        });

    </script>
@endsection