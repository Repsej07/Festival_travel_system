<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;
use App\Models\User;

class festivalController extends Controller
{
    public function showFestival(Festival $festival)
    {
        return view('festival.festivalInfo', ['festival' => $festival]);
    }
    public function registerFestival(Festival $festival, User $user){
        return view('festival.festivalRegister', ['festival' => $festival, 'user' => $user]);

    }
    public function unregisterFestival(Festival $festival, User $user){
        $user->festivals()->detach($festival);
        return redirect()->route('userDashboard');
    }
}
