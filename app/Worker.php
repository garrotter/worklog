<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    public $table = "workers";
    public $timestamps = null;

    public function work()
    {
        return $this->belongsToMany('App\Work', "workers_to_work", "worker_id", "work_id");
    }
}
