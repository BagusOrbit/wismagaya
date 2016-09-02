<?php
/**
 * Created by PhpStorm.
 * User: masDhendra
 * Date: 1/6/2016
 * Time: 3:59 PM
 */

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use App\Http\Models\Biaya;
use App\Http\Models\Itembiaya;
use App\Http\Models\Room;
use App\Http\Models\Typeroom;
use App\Http\Models\Reservasi;
use App\Http\Models\Reservasidetail;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class BiayaController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(Request $request)
    {
        $biaya = Biaya::paginate(25);
        return view('transaksi.biaya.index',compact('biaya'));
    }

    public function getTambah()
    {
        $itembiaya = Itembiaya::lists('nama', 'id');
        return view('transaksi.biaya.tambah',compact('itembiaya'));
    }

    public function postTambah(Request $request)
    {
        $this->validate($request,['itembiayaid'=> 'required','tanggal' => 'required','nominal'=>'required']);
        $itembiaya = Itembiaya::find($request->get('itembiayaid'));
        $biaya = new Biaya();
        $biaya->itembiayaid = $itembiaya->id;
        $biaya->nama = $itembiaya->nama;
        $biaya->kodeakun = $itembiaya->kodeakun;
        $biaya->tanggal = $request->get('tanggal');
        $biaya->nominal = $request->get('nominal');

        if ($biaya->save()) {
            Flash::success('Berhasil menambah data biaya.');

            return redirect('biaya');
        } else {
            Flash::warning('Gagal menambah data biaya.');

            return redirect()->back()->withInput();
        }

    }

    public function getEdit($id,Request $request)
    {
        $itembiaya = Itembiaya::lists('nama','id');
        $biaya = Biaya::find($id);
        
        return view('transaksi.biaya.edit',compact('itembiaya','biaya'));
    }

    public function postEdit($id,Request $request)
    {
        $this->validate($request,['itembiayaid'=> 'required','tanggal' => 'required','nominal'=>'required']);
        $itembiaya = Itembiaya::find($request->get('itembiayaid'));
        $biaya = Biaya::find($id);
        $biaya->itembiayaid = $itembiaya->id;
        $biaya->nama = $itembiaya->nama;
        $biaya->kodeakun = $itembiaya->kodeakun;
        $biaya->tanggal = $request->get('tanggal');
        $biaya->nominal = $request->get('nominal');

       if ($biaya->save()) {
            Flash::success('Berhasil merubah data biaya.');

            return redirect('biaya');
        } else {
            Flash::warning('Berhasil merubah data Pemesanan Kamar.');

            return redirect()->back()->withInput();
        }
    }

    public function getHapus($id = null)
    {
        $biaya = Biaya::find($id);
        return view('Transaksi.biaya.hapus',compact('biaya'));
    }

    public function postHapus($id)
    {
        $delete = Biaya::destroy($id);
       if ($delete) {
            Flash::success("Berhasil menghapus data Biaya.");
        } else {
            Flash::warning("Gagal menghapus data Biaya.");
        }
        return redirect('/biaya');
    }
}