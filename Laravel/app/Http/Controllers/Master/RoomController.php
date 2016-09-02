<?php
/**
 * Created by PhpStorm.
 * User: masDhendra
 * Date: 1/6/2016
 * Time: 5:00 PM
 */

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Http\Models\Room;
use App\Http\Models\Typeroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Laracasts\Flash\Flash;


class RoomController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(Request $request)
    {
        $data = Room::all();
        // var_dump($data);
        // exit();
        return view('master.room.index',compact('data'));

    }

    public function getTambah()
    {
        $typeroom =Typeroom::lists('namatyperoom', 'idtyperoom');
        return view('master.room.tambah',compact('typeroom'));
    
    }

    public function postTambah(Request $request)
    {

        $rules = ['noroom' => 'required',
            'namaroom' => 'required',
            'idtyperoom' => 'required'];

        $this->validate($request,$rules);
        $room = new Room();
        $room->noroom = $request->get('noroom');
        $room->namaroom = $request->get('namaroom');
        $room->idtyperoom = $request->get('idtyperoom');
        $room->fasilitas = $request->get('fasilitas');
        $room->harga = $request->get('harga');
        $room->kodereservasi = '- ';
        if ($room->save()) {
            Flash::success('Berhasil menambah data Kamar.');

            return redirect('room');
        } else {
            Flash::warning('Gagal menambah data Kamar.');

            return redirect()->back()->withInput();
        }

    }

    public function getEdit($id,Request $request)
    {
        $typeroom =Typeroom::lists('namatyperoom', 'idtyperoom');
        $room = Room::find($id);
        return view('master.room.edit',compact('typeroom','room'));
    }

    public function postEdit($id,Request $request)
    {
        $rules = ['noroom' => 'required',
            'namaroom' => 'required',
            'idtyperoom' => 'required'];

        $this->validate($request,$rules);
        $room = Room::find($id);
        $room->noroom = $request->get('noroom');
        $room->namaroom = $request->get('namaroom');
        $room->idtyperoom = $request->get('idtyperoom');
        $room->fasilitas = $request->get('fasilitas');
        $room->harga = $request->get('harga');

        if ($room->save()) {
           Flash::success('Berhasil mengedit data Kamar.');
           return redirect('room');
       } else {
            Flash::warning('Gagal mengedit data Kamar.');
            return redirect()->back()->withinput();
       }
    }

    public function getHapus($id = null)
    {
        $room = Room::find($id);
        return view('master.room.hapus',compact('room'));
    }

    public function postHapus($id)
    {
        $delete = Room::destroy($id);
       if ($delete) {
            Flash::success("Berhasil menghapus data Kamar.");
        } else {
            Flash::warning("Gagal menghapus data Kamar.");
        }
        return redirect('/room');
        
    }
}