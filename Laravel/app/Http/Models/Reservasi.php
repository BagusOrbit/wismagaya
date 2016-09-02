<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model {
    protected $table = "reservasihotel";
    public $timestamps = false;
    protected $primaryKey = 'id';
   
}