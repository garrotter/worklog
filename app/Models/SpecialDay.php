<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpecialDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'date', 'special'
    ];

    protected $hidden = [];

    public $table = "special_days";
    public $timestamps = null;
}
