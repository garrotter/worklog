<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'id', 'date', 'note'
    ];

    protected $hidden = [];

    public $table = "notes";
    public $timestamps = null;

}
