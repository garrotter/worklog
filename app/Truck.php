<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    public $table = "trucks";
    public $timestamps = null;

    public function work()
    {
        return $this->belongsToMany('App\Work', "truck_to_work", "truck_id", "work_id");
    }
}
