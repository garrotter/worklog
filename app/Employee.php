<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $table = "employees";
    public $timestamps = null;

    public function company()
    {
        return $this->belongsTo('App\Company', "company_id", "id");
    }
    public function work()
    {
        return $this->belongsToMany('App\Work', 'contacts_to_work');
    }
}
