<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;

class festivalController extends Controller
{
    public function showFestival(Festival $festival)
    {
        return view('festival.festivalInfo', ['festival' => $festival]);
    }
}
