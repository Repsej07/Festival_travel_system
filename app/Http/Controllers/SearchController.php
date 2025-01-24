<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Festival; // Example model

class SearchController extends Controller
{
    public function searchFestivals(Request $request)
    {
        $query = $request->get('query');
        $festivals = Festival::where('name', 'LIKE', "%{$query}%")
            ->orWhere('location', 'LIKE', "%{$query}%")
            ->take(10)
            ->get();

        return response()->json($festivals);
    }
}
