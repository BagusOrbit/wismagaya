<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasidetail extends Model {
    protected $table = "reservasidetailhotel";
    public $timestamps = false;
    protected $primaryKey = 'idpemesanandetail';
   
}