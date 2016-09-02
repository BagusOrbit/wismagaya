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
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class ReservasidetailController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(Request $request)
    {
        $reservasi = Reservasi::all();
        // dd($reservasi);
        // exit();
        return view('transaksi.reservasi.index',compact('reservasi'));
    }

    public function getTambah($id)
    {
        $room = Room::lists('namaroom','idroom');
        $reservasi = Reservasi::find($id);
        $reservasidetail = Reservasidetail::where('nopesanan', $reservasi->nopesanan)->get();
        return view('transaksi.reservasidetail.tambah',compact('reservasidetail','room','reservasi'));
    }

    public function postTambah($id,Request $request)
    {
        $this->validate($request,['tglcheckin'=> 'required','tglcheckout' => 'required']);
        $reservasi = Reservasi::find($id);
        $room = Room::find($request->get('idroom'));
        
        $validasiTanggal = Reservasidetail::where(
            'tglcheckin',$request->get('tglcheckin') 
            && 'tglcheckout',$request->get('tglcheckout'))->get();
        foreach ($validasiTanggal as $item) {
            
                if ($item->noroom = $room->noroom) {
                    Flash::warning('Kamar sudah di pesan.');
                    return redirect()->back()->withInput();
                }
        }
        $reservasidetail = new Reservasidetail();
        $reservasidetail->nopesanan = $reservasi->nopesanan;
        $reservasidetail->nota = '-';
        $reservasidetail->noroom = $room->noroom;
        $reservasidetail->tglcheckin = $request->get('tglcheckin');
        $reservasidetail->tglcheckout = $request->get('tglcheckout');
        $reservasidetail->Jumlahhari = $request->get('Jumlahhari');
        $reservasidetail->sewaperhari = $room->harga;
        $reservasidetail->subtotal = $request->get('Jumlahhari') * $room->harga;
        // $reservasidetail->statusbatal=fal;
        $reservasidetail->jenis = 1;
        //update kamar
        $room->kodereservasi = $reservasi->nopesanan;
        $room->status = 1;

        if ($reservasidetail->save() & $room->save()) {
            Flash::success('Berhasil menambah data Pemesanan Kamar.');

            return redirect('reservasidetail/tambah/'.$id);
        } else {
            Flash::warning('Gagal menambah data Pemesanan Kamar.');

            return redirect()->back()->withInput();
        }

    }


    public function getHapus($id = null)
    {
       $reservasidetail = Reservasidetail::find($id);

        $reservasi = Reservasi::where('nopesanan',$reservasidetail->nopesanan)->first();
        
        return view('transaksi.reservasidetail.hapus',compact('reservasidetail','reservasi'));
    }

    public function postHapus($id)
    {
        $reservasidetailold = Reservasidetail::find($id);
        $reservasi = Reservasi::where('nopesanan',$reservasidetailold->nopesanan)->first();
        //update room
        $room = Room::where('noroom',$reservasidetailold->noroom)->first();

        $room->kodereservasi='-';
        $room->status = 0;
        $room->save();

        $reservasidetail = Reservasidetail::destroy($id);
        
        if ($reservasidetail ) {
            Flash::success('Berhasil menghapus data detail Reservasi Kamar.');
            
            return redirect('reservasidetail/tambah/'.$reservasi->id);
        } else {
            Flash::warning('Gagal menghapus data detail Reservasi Kamar.');
            return redirect()->back()->withInput();
        }
    }
}