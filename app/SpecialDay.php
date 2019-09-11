<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialDay extends Model
{
    protected $fillable = [
        'id', 'date', 'special'
    ];

    protected $hidden = [];

    public $table = "special_days";
    public $timestamps = null;
}
