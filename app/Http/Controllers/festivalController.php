<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Busreizen;

class festivalController extends Controller
{
    public function showFestival(Festival $festival)
    {
        return view('festival.festivalInfo', ['festival' => $festival]);
    }
    public function indexRegisterFestival(Festival $festival, User $user){
        $user = Auth::user();
        $points = $user->points;
        $busreizen = Busreizen::where('festival_id', $festival->id)->get();
        return view('festival.festivalRegister', ['festival' => $festival, 'user' => $user, 'points' => $points, 'busreizen' => $busreizen]);

    }
    public function RegisterFestival(Festival $festival, User $user, Request $request){
        $departure = $request->input('departure');
        $points = $request->input('points');
        $festival->tickets = $festival->tickets - 1;

        $festival->save();
        if($festival->tickets == 0){
            $festival->status = 'sold';
            $festival->save();
        }
        $user->points = $user->points - $points;
        $user->save();

        $user->festivals()->attach($festival, ['departure' => $departure]);
        return redirect()->route('userDashboard');
    }
    public function unregisterFestival(Festival $festival, User $user){
        $user->festivals()->detach($festival);
        $festival->tickets = $festival->tickets + 1;
        $festival->save();
        if($festival->status == 'sold'){
            $festival->status = 'active';
            $festival->save();
        }
        return redirect()->route('userDashboard');
    }
    public function searchFestivals(Request $request)
    {
        $festivals = Festival::where('name', 'like', '%' . $request->input('search') . '%')
            ->orWhere('location', 'like', '%' . $request->input('search') . '%')
            ->orWhere('date', 'like', '%' . $request->input('search') . '%')
            ->orWhere('description', 'like', '%' . $request->input('search') . '%')
            ->get();

        $output = '';

        foreach ($festivals as $festival) {
            if ($festival->status == 'active') {
                $output .= '
                    <li class="h-60 w-[98%] bg-system_gray_light mt-4 mx-auto rounded-lg flex flex-row" id="all_festivals">
                        <div class="ml-2 pt-2 mb-3 flex flex-col">
                            <h1 class="text-3xl">' . htmlspecialchars($festival->name) . '</h1>
                            <img src="' . asset("storage/{$festival->image}") . '" alt="Festival Picture" class="h-40 w-40">
                        </div>
                        <div class="flex-grow w-[50%] flex items-center justify-end pr-4 mt-4 mx-auto overflow-hidden">
                            <span class="w-[100%] h-[60%] p-2">
                                ' . htmlspecialchars(\Illuminate\Support\Str::words($festival->description, 75, '...')) . '
                            </span>
                        </div>
                        <div class="flex flex-row w-50 h-60 items-end justify-end">
                            <a href="' . route('festival.info', ['festival' => $festival->id]) . '"
                                class="bg-Jesper p-2 rounded-md text-white w-24 h-10 text-center hover:bg-Jesper_light mb-2 mr-2">Info</a>';

                if ($festival->users->contains(Auth::user()->id)) {
                    $output .= '
                            <a href="' . route('festival.unregister', ['festival' => $festival->id, 'user' => Auth::user()->id]) . '"
                                class="bg-red-500 p-2 rounded-md text-white w-24 h-10 text-center hover:bg-red-700 mb-2 mr-2">Unregister</a>';
                } else {
                    $output .= '
                            <a href="' . route('festival.register', ['festival' => $festival->id, 'user' => Auth::user()->id]) . '"
                                class="bg-Jesper p-2 rounded-md text-white w-24 h-10 text-center hover:bg-Jesper_light mb-2 mr-2">Register</a>';
                }

                $output .= '
                        </div>
                    </li>';
            }
        }

        return response($output);
    }

}
