<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;

class userDashboard extends Controller
{
    public function index()
    {
        $festivals = Festival::all();
        return view('userDashboard', ['festivals' => $festivals]);
    }
}
