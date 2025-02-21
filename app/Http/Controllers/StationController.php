<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    // Autocomplete search method
    public function autocomplete(Request $request)
    {
        // Retrieve the search query from the user input
        $query = $request->input('query');

        // Perform the search in the database
        $stations = Station::where('name', 'like', "%{$query}%")
                            ->orWhere('code', 'like', "%{$query}%")
                            ->limit(10)  // Limit the results
                            ->get(['id', 'name']);  // Get the station ID and name

        // Return the results as JSON
        return response()->json($stations);
    }
}
