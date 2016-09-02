<?php
/**
 * Created by PhpStorm.
 * User: masDhendra
 * Date: 1/6/2016
 * Time: 3:59 PM
 */

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Http\Models\Room;
use App\Http\Models\Typeroom;
use App\Http\Models\Reservasi;
use App\Http\Models\Reservasidetail;
use App\Http\Models\Inap;
use App\Http\Models\Inapdetail;
use App\Http\Models\Inaptambahan;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;


class InapkamarController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(Request $request)
    {
        $inap = Inap::orderby('tglinput','desc')->paginate(20);
        // dd($reservasi);
        // exit();
        return view('transaksi.inapkamar.index',compact('inap'));
    }

    public function getTambah($id)
    {
        $room = Room::where('status',0)->lists('namaroom','idroom');
       
        $reservasi = Reservasi::find($id);
        $reservasidetail = Reservasidetail::where('nopesanan', $reservasi->nopesanan)->get();
        return view('transaksi.inapkamar.tambah',compact('reservasidetail','room','reservasi'));
    }

    public function postTambah($id,Request $request)
    {
        if($request->get('totalsemua') == "0")
        {
            Flash::warning('Gagal menambah data Pemesanan Kamar.');
            return redirect()->back()->withInput();
        }
        $pajakpct = $request->get('pajaknominal') * 100 / ($request->get('totalakhir') - $request->get('potongannominal'));
        $potonganpct = $request->get('potongannominal') * 100 / $request->get('totalakhir');
        $now = new \DateTime();
        $reservasi = Reservasi::find($id);
        $reservasi->status = 2;
        //header Menginap
        $inap = new Inap();
        $inap->nota = "-";
        $inap->nopesanan = $reservasi->nopesanan;
        $inap->namapesanan = $reservasi->namapesanan;
        $inap->tglinput = $now;
        $inap->alamat = $reservasi->alamat;
        $inap->notelp = $reservasi->notelp;
        $inap->noidentitas = $reservasi->noidentitas;
        $inap->dp = $request->get('dp');
        $inap->tunai = $request->get('dp');
        $inap->potonganpct = $potonganpct;
        $inap->potongannominal = $request->get('potongannominal');
        $inap->pajakpct = $pajakpct;
        $inap->pajaknominal = $request->get('pajaknominal');
        $inap->total = $request->get('totalsemua');
        $inap->Kredit = 0;
        $inap->biayalain = $request->get('biayalain');
        $inap->biayajual = 0;
        $inap->terbilang = "";
        $inap->status=2;
        $inap->akunbiayajual = '1-1110';
        $inap->akunpotongan = '4-1500';
        $inap->akunbiayalain = '4-1700';
        $inap->akuntunaidp = '1-1110';
        $inap->akunkredit ='1-1210';
        $inap->akunpendapatanjual = '4-1100';
        $inap->akundppesanan  = '2-3100';
        $inap->akunpajak = '2-4110';
        $inap->jenis = 1;
        $inap->inclbiaya = 0;
        $inap->akunkartukredit = "";
        $inap->akunkartudebet = "";
        $inap->kartudebet = 0;
        $inap->kartukredit = 0;
        $inap->bayar = $request->get('dp');
        $inap->kembalian = 0;
        $inap->nokartukredit = "";
        $inap->nokartudebet =  "";
        $inap->terbayar = $request->get('dp');
        $inap->createuser = "";
        $inap->shiftid = 1;
        $inap->save();
        //detail menginap
        $reservasidetail = Reservasidetail::where('nopesanan', $reservasi->nopesanan)->get();
        foreach ($reservasidetail as $item) {
            $inapdetail = new Inapdetail();
            $inapdetail->nopesanan = $item->nopesanan;
            $inapdetail->nonota = $item->nota;
            $inapdetail->noroom = $item->noroom;
            $inapdetail->tglcheckin = $item->tglcheckin;
            $inapdetail->tglcheckout = $item->tglcheckout;
            $inapdetail->Jumlahhari = $item->Jumlahhari;
            $inapdetail->sewaperhari = $item->sewaperhari;
            $inapdetail->subtotal = $item->subtotal;
            $inapdetail->jenis = 1;
            $inapdetail->save();
        }
         

        if ($reservasi->save()) {
            Flash::success('Berhasil menambah data inap Kamar.');

            return redirect('inapkamar/index');
        } else {
            Flash::warning('Gagal menambah data inap Kamar.');

            return redirect()->back()->withInput();
        }

    }

    public function getTambahdetail($id)
    {       
        $inap = Inap::find($id);
        $reservasi = Reservasi::where('nopesanan',$inap->nopesanan)->first();
        $inaptambahan = Inaptambahan::where('nopesanan',$inap->nopesanan)->get();
        
        return view('transaksi.inapkamar.tambahdetail',compact('reservasi','inaptambahan'));
    }
    public function postTambahdetail($id, Request $request)
    {       
        $this->validate($request,['namatambahan'=> 'required','qty' => 'required','harga' => 'required']);
        $inap = Inap::find($id);

        $inaptambahan = new Inaptambahan();
        $inaptambahan->namatambahan = $request->get('namatambahan');
        $inaptambahan->qty = $request->get('qty');
        $inaptambahan->harga = $request->get('harga');
        $inaptambahan->subtotal = $request->get('harga') * $request->get('qty');
        $inaptambahan->nopesanan = $inap->nopesanan;
        $inaptambahan->nota = $inap->nota;
        //update inap header
        $inap->total = $inap->total + $inaptambahan->subtotal;
        $inap->save();
        if ($inaptambahan->save()) {
            
            $inaptambahan = Inaptambahan::where('nopesanan',$inap->nopesanan)->get();
            Flash::success('Berhasil menambah data Tambahan Kamar.',compact('inaptambahan'));
            return redirect('inapkamar/tambahdetail/'.$id);
        } else {
            Flash::warning('Gagal menambah data Tambahan Kamar.');

            return redirect()->back()->withInput();
        }
    }

    public function getHapustambahan($id = null)
    {
       $inaptambahan = Inaptambahan::find($id);
        $inap = Inap::where('nopesanan',$inaptambahan->nopesanan)->first();
        return view('transaksi.inapkamar.hapustambahan',compact('inaptambahan','inap'));
    }

    public function postHapustambahan($id)
    {
        $inaptambahanold = Inaptambahan::find($id);
        //update inap header
        $inap = Inap::where('nopesanan',$inaptambahanold->nopesanan)->first();
        $inap->total = $inap->total - $inaptambahanold->subtotal;
        $inap->save();

        $inaptambahan = Inaptambahan::destroy($id);
        
        if ($inaptambahan ) {
            Flash::success('Berhasil menghapus data detail tambahan Kamar.');
            
            return redirect('inapkamar/tambahdetail/'.$inap->id);
        } else {
            Flash::warning('Gagal menghapus data detail tambahan Kamar.');
            return redirect()->back()->withInput();
        }
    }

    public function getBayar($id)
    {
        $inap = Inap::find($id);
        $reservasi = Reservasi::where('nopesanan',$inap->nopesanan)->first();
        $inapdetail = Inapdetail::where('nopesanan', $inap->nopesanan)->get();
        $inaptambahan = Inaptambahan::where('nopesanan',$inap->nopesanan)->get();
        if ($inap->total <= $inap->terbayar) {
            Flash::warning('Pembayaran sudah lunas.');
            return redirect()->back();
        }
        return view('transaksi.inapkamar.bayar',compact('reservasi','inapdetail','inap','inaptambahan'));
    }

    public function postBayar($id, Request $request )
    {
        if($request->get('tunai') == "0")
        {
            Flash::warning('Tunai tidak boleh 0.');
            return redirect()->back()->withInput();
        }
        
        $pajakpct = $request->get('pajaknominal') * 100 / ($request->get('totalakhir') - $request->get('potongannominal'));
        $potonganpct = $request->get('potongannominal') * 100 / $request->get('totalakhir');
        $kekurangan = $request->get('kekurangan');
        $tunai = $request->get('tunai');
        $inap = Inap::find($id);
        $reservasi = Reservasi::where('nopesanan',$inap->nopesanan)->first();
        $inapdetail = Inapdetail::where('nopesanan', $inap->nopesanan)->get();
        $inaptambahan = Inaptambahan::where('nopesanan',$inap->nopesanan)->get();

        $inap->total = $request->get('totalsemua');

        $inap->potonganpct == $potonganpct;
        $inap->potongannominal = $request->get('potongannominal');
        $inap->pajakpct = $pajakpct;
        $inap->pajaknominal = $request->get('pajaknominal');
        $inap->biayalain = $request->get('biayalain');
        if ($kekurangan > $tunai) {
            $inap->bayar += $request->get('tunai');
            $inap->terbayar += $request->get('tunai');
            $inap->tunai += $request->get('tunai');
        }
        else{
            $inap->bayar += $request->get('kekurangan');
            $inap->terbayar += $request->get('kekurangan');
            $inap->tunai += $request->get('kekurangan');
        }

        if ($inap->save()) {
            \Redirect::to('inapkamar/pdf/'.$inap->id);
            Flash::success('Berhasil melakukan pembayaran.');

            return redirect('inapkamar');
        } else {
            Flash::warning('Gagal melakukan pembayaran.');

            return redirect()->back()->withInput();
        }
    }

    public function getCekout($id)
    {
        $inapdetail = Inapdetail::find($id);
        $inap = Inap::where('nopesanan',$inapdetail->nopesanan)->first();
        $reservasi = Reservasi::where('nopesanan',$inap->nopesanan)->first();
        
        $inaptambahan = Inaptambahan::where('nopesanan',$inap->nopesanan)->get();
        return view('transaksi.inapkamar.cekout',compact('reservasi','inapdetail','inap','inaptambahan'));
    }
    public function postCekout($id, Request $request)
    {
        $inapdetail = Inapdetail::find($id);
        $inap = Inap::where('nopesanan',$inapdetail->nopesanan)->first();
        $reservasi = Reservasi::where('nopesanan',$inap->nopesanan)->first();
        $inaptambahan = Inaptambahan::where('nopesanan',$inap->nopesanan)->get();
        //update room
        $room = Room::where('noroom',$inapdetail->noroom)->first();
        $room->status = 0;
        $room->kodereservasi = '-';
        $room->save();
        //update detail inap
        $inapdetail->cekout = 1;
        $inapdetail->save();
        Flash::success('Berhasil Cek Out Kamar.',compact('reservasi','inapdetail','inap','inaptambahan'));
        return redirect('inapkamar/bayar/'.$inap->id);
    }
    public function getDetail($id)
    {
        $inap = Inap::find($id);
        $reservasi = Reservasi::where('nopesanan',$inap->nopesanan)->first();
        $inapdetail = Inapdetail::where('nopesanan', $inap->nopesanan)->get();
        $inaptambahan = Inaptambahan::where('nopesanan',$inap->nopesanan)->get();
        
        return view('transaksi.inapkamar.detail',compact('reservasi','inapdetail','inap','inaptambahan'));
    }
    public function getEditdetail($id)
    {
        $inapdetail = Inapdetail::find($id);
        $room = Room::lists('namaroom','idroom');
        $pilihanroom = Room::where('noroom',$inapdetail->noroom)->first();
        $inap = Inap::where('nopesanan',$inapdetail->nopesanan)->first();
        $reservasi = Reservasi::where('nopesanan',$inap->nopesanan)->first();
        
        $inaptambahan = Inaptambahan::where('nopesanan',$inap->nopesanan)->get();
        return view('transaksi.inapkamar.editdetail',compact('reservasi','inapdetail','inap','inaptambahan','room','pilihanroom'));
    }

    public function postEditdetail($id, Request $request)
    {
        $inapdetail = Inapdetail::find($id);
        $inap = Inap::where('nopesanan',$inapdetail->nopesanan)->first();
        $subtotal = $request->get('Jumlahhari') * $inapdetail->sewaperhari;
        // update Header Inap
        $inap->total -= ($inapdetail->subtotal + $inap->pajaknominal);
        $inap->total += $subtotal;
        if ($inap->pajakpct > 0) {
            $pajakNominal = ($inap->total *$inap->pajakpct) / 100;
            $inap->pajaknominal = $pajakNominal;
        }
        $inap->total += $inap->pajaknominal;
        $header = $inap->save();
        //update detail inap
        $inapdetail->tglcheckout = $request->get('tglcheckout');
        $inapdetail->Jumlahhari = $request->get('Jumlahhari');
        $inapdetail->subtotal = $request->get('Jumlahhari') * $inapdetail->sewaperhari;
         $detail = $inapdetail->save();
        if ($header && $detail) {
            Flash::success('Berhasil mengedit detail inap.');

            return redirect('inapkamar/detail/'.$inap->id);
        } else {
            Flash::warning('Gagal mengedit detail inap.');

            return redirect()->back()->withInput();
        }
    }

    public function getHapus($id = null)
    {
       $inap = Inap::find($id);
        $inapdetail = Inapdetail::where('nopesanan', $inap->nopesanan)->get();
        $inaptambahan = Inaptambahan::where('nopesanan',$inap->nopesanan)->get();
        if ($inap->terbayar > 0) {
            Flash::warning('Sudah terdapat pembayaran, tidak bisa menghapus data.');
            return redirect()->back();
        }
        
        return view('transaksi.inapkamar.hapus',compact('inapdetail','inap','inaptambahan'));
    }

    public function postHapus($id)
    {
        $inap = Inap::find($id);
        $inapdetail = Inapdetail::where('nopesanan', $inap->nopesanan)->delete();
        $inaptambahan = Inaptambahan::where('nopesanan',$inap->nopesanan)->delete();
        //update reservasi
        $reservasi = Reservasi::where('nopesanan',$inap->nopesanan)->first();
        $reservasi->status = 1;
        $reservasi->save();
        $hapusInap = Inap::destroy($id);
        
        if ($hapusInap ) {
            Flash::success('Berhasil menghapus data menginap.');
            
            return redirect('inapkamar');
        } else {
            Flash::warning('Gagal menghapus data menginap.');
            return redirect()->back()->withInput();
        }
    }

    public function getPdf($id)
    {
        $inap = Inap::find($id);
        $inapdetail = Inapdetail::where('nopesanan', $inap->nopesanan)->get();
        $inaptambahan = Inaptambahan::where('nopesanan',$inap->nopesanan)->get();
        // dd($inapdetail);
        // exit();
        // $pdf = PDF::loadView('cetak.pdf', $inap);
        $pdf = \PDF::loadView('transaksi.cetak.pdf',compact('inap','inaptambahan','inapdetail'));
        return $pdf->stream(); 
    }
}
