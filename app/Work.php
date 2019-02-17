<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public $table = "works";
    public $timestamps = null;
    
    public function customer()
    {
        return $this->belongsTo('App\Company', 'customer_id', 'id');
    }
    public function contacts()
    {
        return $this->belongsToMany('App\Employee', 'contacts_to_work', 'work_id', 'employee_id');
    }
    public function workers()
    {
        return $this->belongsToMany('App\Worker', "workers_to_work", "work_id", "worker_id");
    }
    public function trucks()
    {
        return $this->belongsToMany('App\Truck', 'trucks_to_work', 'work_id', 'truck_id');
    }
    public function subcontractors()
    {
        return $this->belongsToMany('App\Subcontractor', "subcontractors_to_work", "work_id", "subcontractor_id");
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
