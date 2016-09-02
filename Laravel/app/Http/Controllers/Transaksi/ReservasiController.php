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

class ReservasiController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(Request $request)
    {
        $reservasi = Reservasi::where('status',1)->get();
        // dd($reservasi);
        // exit();
        return view('transaksi.reservasi.index',compact('reservasi'));
    }

    public function getTambah()
    {
        $reservasidetail = null;
        return view('transaksi.reservasi.tambah',compact('reservasidetail'));
    }

    public function postTambah(Request $request)
    {
        $now = new \DateTime();
        // var_dump($now);
        // exit();
        $this->validate($request,['nopesanan'=> 'required','namapesanan' => 'required']);
        $reservasi = new Reservasi();
        $reservasi->nopesanan = $request->get('nopesanan');
        $reservasi->namapesanan = $request->get('namapesanan');
        $reservasi->alamat = $request->get('alamat');
        $reservasi->notelp = $request->get('notelp');
        $reservasi->noidentitas = $request->get('noidentitas');
        $reservasi->tglinput = $now;

        if ($reservasi->save()) {
            Flash::success('Berhasil menambah data Pemesanan Kamar.');

            return redirect('reservasi');
        } else {
            Flash::warning('Gagal menambah data Pemesanan Kamar.');

            return redirect()->back()->withInput();
        }

    }

    public function getEdit($id,Request $request)
    {
        $reservasi = Reservasi::find($id);
        $reservasidetail = Reservasidetail::where('nopesanan', $reservasi->nopesanan)->get();
        return view('transaksi.reservasi.edit',compact('reservasi','reservasidetail'));
    }

    public function postEdit($id,Request $request)
    {
        $this->validate($request,['nopesanan'=> 'required','namapesanan' => 'required']);
        $reservasi = Reservasi::find($id);
        $reservasi->nopesanan = $request->get('nopesanan');
        $reservasi->namapesanan = $request->get('namapesanan');
        $reservasi->alamat = $request->get('alamat');
        $reservasi->notelp = $request->get('notelp');
        $reservasi->noidentitas = $request->get('noidentitas');
       if ($reservasi->save()) {
            Flash::success('Berhasil merubah data Pemesanan Kamar.');

            return redirect('reservasi');
        } else {
            Flash::warning('Berhasil merubah data Pemesanan Kamar.');

            return redirect()->back()->withInput();
        }
    }

    public function getHapus($id = null)
    {
        $reservasi = Reservasi::find($id);
       $reservasidetail = Reservasidetail::where('nopesanan', $reservasi->nopesanan)->get();
        //$reservasidetail = Reservasidetail::all();
        return view('transaksi.reservasi.hapus',compact('reservasi','reservasidetail'));
    }

    public function postHapus($id)
    {
        $reservasiold = Reservasi::find($id);
        $reservasidetail = Reservasidetail::where('nopesanan', $reservasiold->nopesanan)->get();
        foreach ($reservasidetail as $item) {
            //update room
            $room = Room::where('noroom',$item->noroom)->first();
            $room->kodereservasi='-';
            $room->status = 0;
            $room->save();
            $reservasidetailhapus = Reservasidetail::destroy($item->idpemesanandetail);
        }
        $reservasi = Reservasi::destroy($id);

        if ($reservasi && $reservasidetail) {
            Flash::success('Berhasil menghapus data Reservasi Kamar.');
            return redirect('reservasi');
        } else {
            Flash::warning('Gagal menghapus data Reservasi Kamar.');
            return redirect()->back()->withInput();
        }
    }
}