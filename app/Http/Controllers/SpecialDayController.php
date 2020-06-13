<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SpecialDay;

class SpecialDayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getSpecialDay($day) 
    {
        $special = SpecialDay::where('date', '=', $day)->first() ? SpecialDay::where('date', '=', $day)->first()->special : '';

        return $special;
    }
}
