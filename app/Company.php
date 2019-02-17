<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public $table = "companies";
    public $timestamps = null;

    public function employees()
    {
        return $this->hasMany('App\Employee', "company_id", "id");
    }
    public function worksCustomer()
    {
        return $this->hasMany('App\Work', "work_id", "id");
    }
}
