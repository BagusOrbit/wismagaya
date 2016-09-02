<?php namespace App\Http\Presenters;

use Illuminate\Support\Collection;
use Laracasts\Presenter\Presenter;

class RoomPresenter extends Presenter
{
    public function idtyperoom()
    {
        return $this->typeroom != null ? $this->typeroom->namatyperoom : "";
    }
}