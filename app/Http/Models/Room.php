<?php namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;

class Room extends Model{
	use PresentableTrait;
    protected $table = "room";
    public $timestamps = false;
    protected $primaryKey = 'idroom';
    protected $presenter = 'App\Http\Presenters\RoomPresenter';
     protected $fillable = ['noroom', 'namaroom', 'idtyperoom', 'fasilitas','harga','status','kodereservasi'];


     public function typeroom()
    {
        return $this->hasOne('App\Http\Models\Typeroom', 'idtyperoom', 'idtyperoom');
    }
}