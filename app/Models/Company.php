<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    use SoftDeletes;

    public $table = "companies";
    public $timestamps = null;

    public function employees()
    {
        return $this->hasMany('App\Models\Employee', "company_id", "id");
    }
    public function worksCustomer()
    {
        return $this->hasMany('App\Models\Work', "work_id", "id");
    }
}
