<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcontractor extends Model
{
    public $table = "subcontractors";
    public $timestamps = null;
    
    public function work()
    {
        return $this->belongsToMany('App\Work', "subcontractors_to_work", "subcontractor_id", "work_id");
    }
}
