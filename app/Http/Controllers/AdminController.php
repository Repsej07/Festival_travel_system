<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::all();
        $festivals = Festival::all();
        return view('admin.index', ['users' => $users, 'festivals' => $festivals]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
}

