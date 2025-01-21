<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Busreizen;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;



class AdminController extends Controller
{
    private $locations = [
        "Amsterdam",
        "Rotterdam",
        "Den Haag",
        "Utrecht",
        "Eindhoven",
        "Tilburg",
        "Groningen",
        "Almere",
        "Breda",
        "Nijmegen",
        "Haarlem",
        "Zaanstad",
        "Arnhem",
        "Amersfoort",
        "Dordrecht",
        "Leiden",
        "Maastricht",
        "Zwolle",
        "Zoetermeer",
        "Leeuwarden",
        "Hengelo",
        "Deventer",
        "Sittard-Geleen",
        "Venlo",
        "Heerlen",
        "Alkmaar",
        "Hilversum",
        "Roosendaal",
        "Spijkenisse",
        "Pijnacker-Nootdorp",
        "Purmerend",
        "Schiedam",
        "Rijswijk",
        "Gouda",
        "Veenendaal",
        "IJmuiden",
        "Assen",
        "Delft",
        "Oss",
        "Culemborg",
        "Weert",
        "Schaijk",
        "Middelburg",
        "Wageningen",
        "Tiel",
        "Nieuwegein",
        "Houten",
        "Harderwijk",
        "Bunnik",
        "Zaltbommel",
        "Bovenkarspel",
        "Beilen",
        "Barendrecht",
        "Lelystad",
        "Uden",
        "Roermond",
        "Zwijndrecht",
        "Berkel en Rodenrijs",
        "Capelle aan den IJssel",
        "Vlaardingen",
        "Wormerveer",
        "Hoofddorp",
        "Amstelveen",
        "Emmen",
        "Raalte",
        "Oosterhout",
        "Gorinchem",
        "Hengelo",
        "Valkenswaard",
        "Zeist",
        "Borsele",
        "Vught",
        "Waddinxveen",
        "Verenigde Staten",
        "Haarlemmermeer",
        "Hoorn",
        "Dronten",
        "Doetinchem",
        "Borne",
        "Terneuzen",
        "Alphen aan den Rijn",
        "Leidschendam-Voorburg",
        "Zaanstad",
        "Dongen",
        "Roden",
        "Oldenzaal",
        "Nieuw-Vennep",
        "Sittard",
        "Loon op Zand",
        "Sliedrecht",
        "Wijchen",
        "Gorinchem",
        "Ede",
        "Hoorn",
        "Tiel",
        "Limburg",
        "Hengelo",
        "Haarlem",
        "Valkenburg",
        "Hendrik-Ido-Ambacht",
        "Nijkerk",
        "Kampen",
        "Lisse",
        "Helmond",
        "Westland",
        "Oostzaan",
        "Bovenkarspel",
        "Hoogezand-Sappemeer",
        "Hilversum",
        "Tegelen",
        "Schijndel",
        "Goes",
        "Assen",
        "Wervershoof",
        "Bunschoten-Spakenburg",
        "Purmerend",
        "Gouda",
        "Nieuwegein",
        "Veenendaal",
        "Harderwijk",
        "Schoonhoven",
        "Katwilk",
        "Veendam",
        "Vlaardingen",
        "IJsselstein",
        "Zeewolde",
        "Vuren",
        "Haarlemmerliede",
        "Bodegraven",
        "Delft",
        "Woerden",
        "Barneveld",
        "Waddinxveen",
        "Nijmegen",
        "Utrecht",
        "Hengelo",
        "Hilversum",
        "Assen",
        "Groningen",
        "Zwolle",
        "Gouda",
        "Dordrecht",
        "Breda",
        "Almere",
        "Arnhem",
        "Leiden",
        "Leeuwarden",
        "Maastricht",
        "Venlo",
        "Rotterdam"
    ];
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

    public function createFestival(): View
    {
        return view('admin.createFestival');
    }
    public function createBusreis(): View
    {
        $festivals = Festival::all();
        return view('admin.createBusreis', ['festivals' => $festivals], ['locations' => $this->locations]);
    }
    public function createUser(): View
    {
        return view('admin.createUser');
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
    public function editFestival(Festival $festival){
        return view('admin.editFestival', ['festival' => $festival]);
    }
    public function updateFestival(Festival $festival){
        $festival->update([
            'name' => request('name'),
            'location' => request('location'),
            'date' => request('date'),
            'description' => request('description'),
            'price' => request('price'),
            'tickets' => request('tickets'),
            'status' => request('status'),
        ]);
        return redirect(route('admin.index'));
    }

    public function editBusreis(Busreizen $busreis){
        $festivals = Festival::all();
        $departureDateTime = $busreis->departure_date . 'T' . $busreis->departure_time;
        $arrivalDateTime = $busreis->arrival_date . 'T' . $busreis->arrival_time;
        return view('admin.editBusreis', ['busreis' => $busreis, 'festivals' => $festivals, 'departureDateTime' => $departureDateTime, 'arrivalDateTime'=>$arrivalDateTime], ['locations' => $this->locations],);
    }

    public function updateBusreis(Busreizen $busreis){
        // Get the festival location
        $festival = Festival::findOrFail(request('festival_id'));
        // Create a new Busreizen record
        $departure = explode('T', request('departure_date'));
        $arrival = explode('T', request('arrival_date'));

        $busreis->update([
            'departure' => request('departure'),
            'departure_date' => $departure[0],  // YYYY-MM-DD
            'departure_time' => $departure[1],  // HH:MM
            'arrival_date' => $arrival[0],      // YYYY-MM-DD
            'arrival_time' => $arrival[1],      // HH:MM
            'arrival' => $festival->location,   // Get the festival location
            'festival_id' => request('festival_id'),
        ]);
        return redirect(route('admin.index'));
    }

    public function editUser(User $user){
        return view('admin.editUser', ['user' => $user]);
    }
    public function updateUser(User $user){
        if (request('role') == 'admin'){
            $role = true;
        } else if (request('role') == 'user' || request('role') == 'null'){
            $role = false;
        }
        $user->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'username' => request('username'),
            'email' => request('email'),
            'admin' => $role,
        ]);
        return redirect(route('admin.index'));
    }


    public function searchUsers(Request $request)
    {
        $search = $request->input('search');
        $results = User::where('first_name', 'like', '%' . $search . '%')->get();
        return view('admin.user', ['users' => $results]);
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

    public function storeBusreis(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'departure' => 'required|string',
                'departure_date' => 'required|date_format:Y-m-d\TH:i',
                'arrival_date' => 'required|date_format:Y-m-d\TH:i',
                'festival_id' => 'required|exists:festivals,id', // Ensure the festival exists
            ]);

            // Get the festival location
            $festival = Festival::findOrFail($request->festival_id);

            // Extract date and time from the datetime string (T separated format)
            $departure = explode('T', $request->departure_date);
            $arrival = explode('T', $request->arrival_date);

            // Create a new Busreizen record
            Busreizen::create([
                'departure' => $request->departure,
                'departure_date' => $departure[0],  // YYYY-MM-DD
                'departure_time' => $departure[1],  // HH:MM
                'arrival_date' => $arrival[0],      // YYYY-MM-DD
                'arrival_time' => $arrival[1],      // HH:MM
                'arrival' => $festival->location,   // Get the festival location
                'festival_id' => $request->festival_id,
            ]);

            return redirect()->route('admin.index')->with('success', 'Busreis created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating busreis: ' . $e->getMessage());
            return back()->withErrors(['error' => 'Unable to create Busreis. Please try again.']);
        }
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

    public function storeUser(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'unique:' . User::class],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);

        // Store the file and get the path
        $imagePath = $request->file('image')->storeAs(
            'profile_pictures', // Directory to store file
            $request->username . '_' . time() . '.' . $request->file('image')->getClientOriginalExtension(),
            'public' // Use the public disk
        );

        $admin = false; // Default value

        if ($request->role == 'admin'){
            $admin = true;
        } else if ($request->role == 'user' || $request->role == 'null'){
            $admin = false;
        }

        // Create user record in DB with the file path
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'admin' => $admin,
            'password' => Hash::make($request->password),
            'profile_picture' => $imagePath, // Store the file path in the DB
        ]);

        return redirect(route('admin.index'));


    }
    public function destroyUser(User $user){
        $user->delete();
        return redirect(route('admin.index'));
    }
    public function destroyFestival(Festival $festival){
        $festival->delete();
        return redirect(route('admin.index'));
    }
    public function destroyBusreis(Busreizen $busreis){
        $busreis->delete();
        return redirect(route('admin.index'));
    }
}
