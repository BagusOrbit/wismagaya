<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Biaya extends Model {
    protected $table = "biayanontransaksi";
    public $timestamps = false;
    protected $primaryKey = 'id';
   
}