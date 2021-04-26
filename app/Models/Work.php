<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Work extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id', 'date', 'time', 'need', 'address', 'order_number', 'lead', 'decription', 'comment', 'started_time', 'ended_time'
    ];

    protected $hidden = [];

    public $table = "works";
    public $timestamps = null;

    public function customer()
    {
        return $this->belongsTo('App\Models\Company', 'customer_id', 'id');
    }
    public function contacts()
    {
        return $this->belongsToMany('App\Models\Employee', 'contacts_to_work', 'work_id', 'employee_id');
    }
    public function workers()
    {
        return $this->belongsToMany('App\Models\Worker', "workers_to_work", "work_id", "worker_id");
    }
    public function trucks()
    {
        return $this->belongsToMany('App\Models\Truck', 'trucks_to_work', 'work_id', 'truck_id');
    }
    public function subcontractors()
    {
        return $this->belongsToMany('App\Models\Subcontractor', "subcontractors_to_work", "work_id", "subcontractor_id");
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
