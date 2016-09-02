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
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

class CekkamarController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex(Request $request)
    {
        $room = Room::all();
        $awal = "";
        // $room = DB::select(DB::raw(
        //         "Select * from room WHERE noroom"));
        // dd($reservasi);
        // exit();
        return view('transaksi.cekkamar.index',compact('room','awal'));
    }
    public function  postIndex(Request $request)
    {
        $room = Room::all();
        // $awal =  $request->get('tglcheckin');
        $awal =  $request->tglcheckin;
        $akhir =  $request->get('tglcheckout');
        //clone 
        // $room2 = clone $room;
        
        if ($awal != "" && $akhir != "") {
            $room = DB::select(DB::raw(
                "Select * from room WHERE noroom NOT IN (SELECT noroom 
                    FROM reservasidetailhotel WHERE statusbatal = 0 AND
                    ((tglcheckin <= '$awal' AND tglcheckout >= '$awal') 
                    OR (tglcheckin <= '$akhir' AND tglcheckout >= '$akhir')
                    OR (tglcheckin >= '$awal' AND tglcheckout <= '$akhir')))"));
            
        //     $validasiTanggal = Reservasidetail::whereRaw(
        //     "(tglcheckin <= ? && tglcheckout >= ?) 
        //     OR (tglcheckin <= ? && tglcheckout >= ?)
        //     OR (tglcheckin >= ? && tglcheckout <= ?)", 
        //     [$awal,$awal,$akhir,$akhir,$awal,$akhir])->get();
       
        // foreach ($validasiTanggal as $item) {
        //         $roomBaru = Room::where('noroom',$item->noroom)->first();
        //         // dd($roomBaru);
        //          $a = $room2->where('idroom',[$roomBaru->idroom])->first();
                 
        // }
        }
        
       return view('transaksi.cekkamar.index',compact('room','awal','akhir')); 
    }
    
}