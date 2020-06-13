<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $fillable = [
        'date', 'sd'
    ];

    protected $hidden = [];
}
