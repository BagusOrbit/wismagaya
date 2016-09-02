<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        
        <title>Laporan Provinsi</title>
        <body>
            <style type="text/css">
                .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;width: 100%; }
                .tg td{font-family:Arial;font-size:12px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
                .tg th{font-family:Arial;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
                .tg .tg-3wr7{font-weight:bold;font-size:12px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-ti5e{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;;text-align:center}
                .tg .tg-rv4w{font-size:10px;font-family:"Arial", Helvetica, sans-serif !important;}
            </style>
  
            <div style="font-family:Arial; font-size:12px;">
                <center><h2>Transaksi Wisma Gaya</h2></center>  
            </div>
            <table border="0">
                <tr>
                    <td>No Pesanan </td><td>:</td><td>{!! $inap->nopesanan !!}</td>
                </tr>
                <tr>
                    <td>Nama </td><td>:</td><td>{!! $inap->namapesanan !!}</td>
                </tr>
                <tr>
                    <td>Alamat </td><td>:</td><td>{!! $inap->alamat !!}</td>
                </tr>
                <tr>
                    <td>Telp </td><td>:</td><td>{!! $inap->notelp !!}</td>
                </tr>
            </table>
            <br>
            @if (count($inapdetail) > 0)
            <div style="font-family:Arial; font-size:12px;">
                <center><h2>Detail</h2></center>  
            </div>
            <table class="tg">
              <tr>
                <th class="tg-3wr7">No<br></th>
                <th class="tg-3wr7">No Kamar<br></th>
                <th class="tg-3wr7">Hari<br></th>
                <th class="tg-3wr7">Sewa Perhari<br></th>
                <th class="tg-3wr7">Subtotal<br></th>
              </tr>
              <?php $no = 1 ; ?>
              @foreach ($inapdetail as $data)
              <tr>

                <td class="tg-rv4w" width="20%">{!! $no++ !!}</td>
                <td class="tg-rv4w" width="40%">{!! $data->noroom !!}</td>
                <td class="tg-rv4w" width="30%">{!! $data->Jumlahhari !!}</td>
                <td class="tg-rv4w" width="30%">{!! number_format($data->sewaperhari) !!}</td>
                <td class="tg-rv4w" width="30%">{!! number_format($data->subtotal) !!}</td>
              </tr>
              @endforeach
              <tr>
                    <th colspan="4">TOTAL :</th>
                    <th  align="right"> {!! number_format($inapdetail->sum('subtotal'),0) !!}</th>
                </tr>
            </table>
            @endif
            <br>
            @if (count($inaptambahan) > 0)
            <div style="font-family:Arial; font-size:12px;">
                <center><h2>Tambahan</h2></center>  
            </div>
            <table class="tg">
              <tr>
                <th class="tg-3wr7">No<br></th>
                <th class="tg-3wr7">Keterangan<br></th>
                <th class="tg-3wr7">Qty<br></th>
                <th class="tg-3wr7">Harga<br></th>
                <th class="tg-3wr7">Subtotal<br></th>
              </tr>
              <?php $no = 1 ; ?>
              @foreach ($inaptambahan as $data)
              <tr>

                <td class="tg-rv4w" width="20%">{!! $no++ !!}</td>
                <td class="tg-rv4w" width="40%">{!! $data->namatambahan !!}</td>
                <td class="tg-rv4w" width="30%">{!! $data->qty !!}</td>
                <td class="tg-rv4w" width="30%">{!! number_format($data->harga) !!}</td>
                <td class="tg-rv4w" width="30%">{!! number_format($data->subtotal) !!}</td>
              </tr>
              @endforeach
              <tr>
                    <th colspan="4">TOTAL :</th>
                    <th  align="right"> {!! number_format($inaptambahan->sum('subtotal'),0) !!}</th>
                </tr>
            </table>
            </table>
            @endif
            <br>
            <hr>
            <?php 
                $totaltransaksi = $inaptambahan->sum('subtotal') + $inapdetail->sum('subtotal') ;
                $potongan = $inap->potongannominal;
                $pajak = $inap->pajaknominal;
                $biaya = $inap->biayalain;
                $totalakhir = $totaltransaksi - $potongan + $pajak + $biaya;
             ?>
            <table border="0">

                <tr>
                    <th align="left">Total Transaksi </th><th>:</th><th align="right">{!! number_format($totaltransaksi) !!}</th>
                </tr>
                <tr>
                    <th align="left">Potongan </th><th>:</th><th align="right">{!! number_format($inap->potongannominal) !!}</th>
                </tr>
                <tr>
                    <th align="left">Pajak </th><th>:</th><th align="right">{!! number_format($inap->pajaknominal) !!}</th>
                </tr>
                <tr>
                    <th align="left">Biaya Lain </th><th>:</th><th align="right">{!! number_format($inap->biayalain) !!}</th>
                </tr>
                <tr>
                    <th align="left">Total Akhir </th><th>:</th><th align="right">{!! number_format($totalakhir) !!}</th>
                </tr>
            </table>
        </body>
    </head>
</html>