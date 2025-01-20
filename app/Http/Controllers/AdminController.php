<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Busreizen;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::all();
        $festivals = Festival::all();
        $busreizen = Busreizen::all();
        return view('admin.index', ['users' => $users, 'festivals' => $festivals, 'busreizen' => $busreizen]);

    }

    /**
     * Show the form for creating a new resource.
     */

    public function createFestival(): View{
        return view('admin.createFestival');



    }
    public function createBusreis(): View{
        $festivals = Festival::all();
        return view('admin.createBusreis', ['festivals' => $festivals]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Festival $festival)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Festival $festival)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Festival $festival)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Festival $festival)
    {
        //
    }
    public function searchUsers(Request $request)
    {
        $search = $request->input('search');
        $results = User::where('name', 'like', '%' . $search . '%')->get();
        return view('admin.users', ['users' => $results]);
    }

    public function searchFestivals(Request $request)
    {
        $search = $request->input('search');
        $results = Festival::where('name', 'like', '%' . $search . '%')->get();
        return view('admin.festivals', ['festivals' => $results]);
    }

    public function searchBusreizen(Request $request)
    {
        $search = $request->input('search');
        $results = Busreizen::where('name', 'like', '%' . $search . '%')->get();
        return view('admin.busreizen', ['busreizen' => $results]);
    }

    public function storeBusreis(Request $request){

    }
    public function storeFestival(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
                'location' => 'required|string',
                'date' => 'required|date',
                'description' => 'required|string',
                'price' => 'required|numeric',
                'tickets' => 'required|integer',
                'status' => 'required|string|in:active,inactive',
            ]);

            $imagePath = $request->file('image')->storeAs(
                'festival_pictures',
                $request->name . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension(),
                'public'
            );

            Festival::create([
                'name' => $request->name,
                'location' => $request->location,
                'date' => $request->date,
                'description' => $request->description,
                'image' => $imagePath,
                'price' => $request->price,
                'tickets' => $request->tickets,
                'status' => $request->status,
            ]);

            return redirect()->route('admin.index')->with('success', 'Festival created successfully!');
        } catch (\Exception $e) {
            Log::error('Error saving festival: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Unable to save festival. Please try again.']);
        }
    }

}

