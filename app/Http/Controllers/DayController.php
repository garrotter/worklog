<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Day;

class DayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function setDay($day)
    {
        $dayObj = new Day;
        // $dayObj->date = date('Y-m-d', strtotime($day));
        $dayObj->date = $day;
        $dayObj->sd = app('App\Http\Controllers\SpecialDayController')->getSpecialDay($day);

        return $dayObj;
    }
}
