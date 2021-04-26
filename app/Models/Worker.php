<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [];

    public $table = "workers";
    public $timestamps = null;

    public function getNameAttribute($value) {
        return Crypt::decrypt($value);
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = Crypt::encrypt($value);
    }

    public function getPhoneAttribute($value) {
        return Crypt::decrypt($value);
    }

    public function setPhoneAttribute($value) {
        $this->attributes['phone'] = Crypt::encrypt($value);
    }

    public function getEmailAttribute($value) {
        return Crypt::decrypt($value);
    }

    public function setEmailAttribute($value) {
        $this->attributes['email'] = Crypt::encrypt($value);
    }

    public function work()
    {
        return $this->belongsToMany('App\Models\Work', "workers_to_work", "worker_id", "work_id");
    }
}
