<?php
/**
 * Created by PhpStorm.
 * User: masDhendra
 * Date: 1/6/2016
 * Time: 3:59 PM
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Models\Itembiaya;
use App\Http\Models\Biaya;
use App\Http\Models\Room;
use App\Http\Models\Typeroom;
use App\Http\Models\Reservasi;
use App\Http\Models\Reservasidetail;
use App\Http\Models\Inaptambahan;
use App\Http\Models\Inapdetail;
use App\Http\Models\Inap;
use App\Http\Models\Bayarkamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class FungsiController extends Controller{

    
    public function postItembiayahapus(Request $request)
    {
     $a = response()->json($request->getContent());
        $a = $a->getData();         
        $obj = json_decode($a);        
        $delete = Itembiaya::destroy($obj->id);
        return $a;
    }
    public function postItembiaya(Request $request)
    {
        $a = response()->json($request->getContent());
        $a = $a->getData();         
        $obj = json_decode($a);
        $isexist = Itembiaya::find($obj->id);
        if ($isexist != null) {
            $isexist->nama = $obj->nama;
            $isexist->kodeakun = $obj->kodeakun;

            $isexist->save();
        }else{
            $itembiaya = new Itembiaya();
            $itembiaya->nama = $obj->nama;
            $itembiaya->kodeakun = $obj->kodeakun;

            $itembiaya->save();    
        }
        return $a;  
    }
    public function getRoom(Request $request)
    {
        $room = Room::all();
        $typeroom = Typeroom::all();
        return response()->json($room);
    }

    public function getTyperoom(Request $request)
    {
        $data = Typeroom::all();
        return response()->json($data);
    }
    public function getReservasidetail(Request $request)
    {
        $data = Reservasidetail::all();
        return response()->json($data);
    }
    public function getReservasi(Request $request)
    {
        $data = Reservasi::all();
        return response()->json($data);
    }
    public function getInaptambahan(Request $request)
    {
        $data = Inaptambahan::all();
        return response()->json($data);
    }
    public function getInapdetail(Request $request)
    {
        $data = Inapdetail::all();
        return response()->json($data);
    }
    public function getInap(Request $request)
    {
        $data = Inap::all();
        return response()->json($data);
    }
    public function getBayarkamar(Request $request)
    {
        $data = Bayarkamar::all();
        return response()->json($data);
    }
     public function getBiaya(Request $request)
    {
        $data = Biaya::all();
        return response()->json($data);
    }

    
}