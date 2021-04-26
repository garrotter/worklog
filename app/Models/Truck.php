<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Truck extends Model
{
    use HasFactory;

    public $table = "trucks";
    public $timestamps = null;

    public function work()
    {
        return $this->belongsToMany('App\Models\Work', "truck_to_work", "truck_id", "work_id");
    }
}
