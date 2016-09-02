<?php
/**
 * Created by PhpStorm.
 * User: masDhendra
 * Date: 1/6/2016
 * Time: 3:59 PM
 */

namespace App\Http\Controllers\Master;


use App\Http\Controllers\Controller;
use App\Http\Models\Room;
use App\Http\Models\Typeroom;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class TyperoomController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(Request $request)
    {
        $data = Typeroom::all();
        return view('master.typeroom.index',compact('data'));
    }

    public function getTambah()
    {
        return view('master.typeroom.tambah');
    }

    public function postTambah(Request $request)
    {
        $this->validate($request,['namatyperoom'=> 'required','Harga' => 'required']);
        $typeroom = new Typeroom();
        $typeroom->namatyperoom = $request->get('namatyperoom');
        $typeroom->Harga = $request->get('Harga');
        $typeroom->Fasilitas = $request->get('Fasilitas');


        if ($typeroom->save()) {
            Flash::success('Berhasil menambah data Tipe Kamar.');

            return redirect('typeroom');
        } else {
            Flash::warning('Gagal menambah data Tipe Kamar.');

            return redirect()->back()->withInput();
        }

    }

    public function getEdit($id,Request $request)
    {
        $typeroom = Typeroom::find($id);
        return view('master.typeroom.edit',compact('typeroom'));
    }

    public function postEdit($id,Request $request)
    {
        $this->validate($request,['namatyperoom'=> 'required','Harga' => 'required']);
        $typeroom = Typeroom::find($id);
        $typeroom->namatyperoom = $request->get('namatyperoom');
        $typeroom->Harga = $request->get('Harga');
        $typeroom->Fasilitas = $request->get('Fasilitas');
       if ($typeroom->save()) {
            Flash::success('Berhasil mengedit data Tipe Kamar.');

            return redirect('typeroom');
        } else {
            Flash::warning('Gagal mengedit data Tipe Kamar.');

            return redirect()->back()->withInput();
        }
    }

    public function getHapus($id = null)
    {
        $typeroom = Typeroom::find($id);
        return view('master.typeroom.hapus',compact('typeroom'));
    }

    public function postHapus($id)
    {
        
        $typeroom = Typeroom::destroy($id);
        if ($typeroom) {
            Flash::success('Berhasil menghapus data Tipe Kamar.');
            return redirect('typeroom');
        } else {
            Flash::warning('Gagal menghapus data Tipe Kamar.');
            return redirect()->back()->withInput();
        }
    }

}