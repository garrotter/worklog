<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'company_id'
    ];

    protected $hidden = [];

    public $table = "employees";
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

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id', 'id');
    }
    public function work()
    {
        return $this->belongsToMany('App\Models\Work', 'contacts_to_work');
    }
}
