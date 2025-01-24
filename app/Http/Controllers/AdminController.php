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
    public function index(): View
    {
        $users = User::all();
        $festivals = Festival::all();
        $busreizen = Busreizen::all();
        return view('admin.index', ['users' => $users, 'festivals' => $festivals, 'busreizen' => $busreizen]);
    }

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
    public function editFestival(Festival $festival)
    {
        return view('admin.editFestival', ['festival' => $festival]);
    }
    public function updateFestival(Festival $festival)
    {
        if (request()->hasFile('image')) {
            $imagePath = request()->file('image')->storeAs(
                'festival_pictures',
                request()->name . '_' . time() . '.' . request()->file('image')->getClientOriginalExtension(),
                'public'
            );
            $festival->image = $imagePath;
        } else {
            $imagePath = $festival->image;
        }

        $festival->update([
            'name' => request('name'),
            'location' => request('location'),
            'image' => $imagePath,
            'date' => request('date'),
            'description' => request('description'),
            'price' => request('price'),
            'tickets' => request('tickets'),
            'status' => request('status'),
        ]);
        return redirect(route('admin.index'));
    }

    public function editBusreis(Busreizen $busreis)
    {
        $festivals = Festival::all();
        $departureDateTime = $busreis->departure_date . 'T' . $busreis->departure_time;
        $arrivalDateTime = $busreis->arrival_date . 'T' . $busreis->arrival_time;
        return view('admin.editBusreis', ['busreis' => $busreis, 'festivals' => $festivals, 'departureDateTime' => $departureDateTime, 'arrivalDateTime' => $arrivalDateTime], ['locations' => $this->locations],);
    }

    public function updateBusreis(Busreizen $busreis)
    {
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

    public function editUser(User $user)
    {
        return view('admin.editUser', ['user' => $user]);
    }
    public function updateUser(User $user)
    {
        if (request('role') == 'admin') {
            $role = true;
        } else if (request('role') == 'client') {
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
    // Fetch users based on the search query
    $users = User::where('first_name', 'like', '%' . $request->input('search') . '%')
        ->orWhere('last_name', 'like', '%' . $request->input('search') . '%')
        ->orWhere('username', 'like', '%' . $request->input('search') . '%')
        ->orWhere('email', 'like', '%' . $request->input('search') . '%')
        ->get();

    // Initialize the output variable
    $output = '';

    // Loop through the users and generate HTML
    foreach ($users as $user) {
        $output .= '
            <div class="bg-Jesper_light text-black mt-2 rounded-lg p-1 mr-2 ml-2 h-46">
                <div class="flex flex-row mt-3 ml-3 mb-3">
                    <li><img src="' . asset("storage/{$user->profile_picture}") . '"
                            alt="Profile Picture" class="h-10 w-10 rounded-full mr-5"></li>
                    <li class="flex items-center">' . htmlspecialchars($user->first_name) . ' ' . htmlspecialchars($user->last_name) . '</li>
                </div>
                <hr class="border-1 border-black">
                <div class="flex flex-col items-start mt-3 ml-3">
                    <li>Username: ' . htmlspecialchars($user->username) . ' ' . htmlspecialchars($user->points) . 'pts</li>
                    <li>Email: ' . htmlspecialchars($user->email) . '</li>
                    <li>Admin: ' . ($user->admin ? 'Yes' : 'No') . '</li>
                </div>
                <div class="flex flex-row items-center justify-end w-full space-x-4">
                    <!-- Edit Button -->
                    <a href="' . route('admin.user.edit', $user->id) . '">
                        <img src="' . url('/assets/edit.svg') . '" alt="edit" class="h-6 w-6">
                    </a>
                    <!-- Delete Button -->
                    <form action="' . route('admin.user.delete', $user->id) . '" method="POST"
                        onsubmit="return confirm(\'Are you sure you want to delete this user?\')">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit">
                            <img src="' . url('/assets/delete.svg') . '" alt="delete" class="h-6 w-6">
                        </button>
                    </form>
                    <a href="' . route('admin.user.info', $user->id) . '">
                        <img src="' . url('/assets/info.svg') . '" alt="info" class="h-6 w-6">
                    </a>
                </div>
            </div>
        ';
    }

    // Return the HTML as a response
    return response($output);
}


    public function searchFestivals(Request $request)
    {
        $festivals = Festival::where('name', 'like', '%' . $request->input('search') . '%')
            ->orWhere('location', 'like', '%' . $request->input('search') . '%')
            ->orWhere('date', 'like', '%' . $request->input('search') . '%')
            ->get();

        $output = '';

        foreach ($festivals as $festival) {
            if ($festival->status == 'active' || $festival->status == 'sold') {
                $output .= '
                <div class="bg-Jesper_light text-black mt-2 rounded-lg p-1 mr-2 ml-2 h-54">
                    <div class="flex flex-row mt-3 ml-3 mb-3">
                        <li><img src="' . asset("storage/{$festival->image}") . '"
                                alt="Festival Picture" class="h-10 w-10 mr-5"></li>
                        <li class="flex items-center">' . htmlspecialchars($festival->name) . '</li>
                    </div>
                    <hr class="border-1 border-black">
                    <div class="flex flex-col items-start mt-3 ml-3">
                        <li>Location: ' . htmlspecialchars($festival->location) . '</li>
                        <li>Date: ' . htmlspecialchars($festival->date) . '</li>
                        <li>Price: € ' . htmlspecialchars($festival->price) . '</li>
                        <li>Tickets left: ' . htmlspecialchars($festival->tickets) . '</li>
                        <div class="flex flex-row w-full">
                            <li>Status: ' . htmlspecialchars($festival->status) . '</li>
                            <a href="' . route('admin.festival.edit', $festival->id) . '"
                                class="ml-auto mr-3"><img src="' . url('/assets/edit.svg') . '"
                                    alt="edit" class="float-right">
                            </a>
                            <form action="' . route('admin.festival.delete', $festival->id) . '"
                                method="POST"
                                onsubmit="return confirm(\'Are you sure you want to delete this festival?\')">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit">
                                    <img src="' . url('/assets/delete.svg') . '" alt="delete"
                                        class="float-right">
                                </button>
                            </form>
                            <a href="' . route('festival.info', $festival->id) . '">
                                <img src="' . url('/assets/info.svg') . '" alt="info" class="h-6 w-6">
                            </a>
                        </div>
                    </div>
                </div>
            ';
            }
        }

        return response($output);
    }



    public function searchBusreizen(Request $request)
{
    $query = $request->input('search');

    // Query the busreizen model for matching results
    $busreizen = Busreizen::with('festival')
        ->where('departure', 'like', '%' . $query . '%')
        ->orWhere('arrival', 'like', '%' . $query . '%')
        ->orWhereHas('festival', function ($q) use ($query) {
            $q->where('name', 'like', '%' . $query . '%');
        })
        ->get();

    $output = '';

    // Generate the HTML dynamically
    foreach ($busreizen as $busreis) {
        $output .= '
            <div class="bg-Jesper_light text-black mt-2 rounded-lg p-1 mr-2 ml-2 h-46">
                <div class="flex flex-row mt-3 ml-3 mb-3">
                    <li class="flex items-center">' . htmlspecialchars($busreis->departure) . ' - ' . htmlspecialchars($busreis->arrival) . '</li>
                </div>
                <hr class="border-1 border-black">
                <div class="flex flex-col items-start mt-3 ml-3">
                    <li>Departure: ' . htmlspecialchars($busreis->departure_date) . ' - ' . htmlspecialchars($busreis->departure_time) . '</li>
                    <li>Arrival: ' . htmlspecialchars($busreis->arrival_date) . ' - ' . htmlspecialchars($busreis->arrival_time) . '</li>
                    <li>Festival: ' . htmlspecialchars($busreis->festival->name ?? 'No festival assigned') . '</li>
                    <div class="flex flex-row justify-between items-end w-full">
                        <a href="' . route('admin.busreis.edit', $busreis->id) . '" class="ml-auto mb-1 mr-3">
                            <img src="' . url('/assets/edit.svg') . '" alt="edit" class="object-right-bottom">
                        </a>
                        <form action="' . route('admin.busreis.delete', $busreis->id) . '" method="POST"
                              onsubmit="return confirm(\'Are you sure you want to delete this busreis?\')">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="submit">
                                <img src="' . url('/assets/delete.svg') . '" alt="delete" class="object-right-bottom">
                            </button>
                        </form>
                        <a href="' . route('admin.busreis.info', $busreis->id) . '">
                            <img src="' . url('/assets/info.svg') . '" alt="info" class="h-6 w-6">
                        </a>
                    </div>
                </div>
            </div>';
    }

    return response($output);
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

    public function storeUser(Request $request)
    {
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

        if ($request->role == 'admin') {
            $admin = true;
        } else if ($request->role == 'user' || $request->role == 'null') {
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
    public function destroyUser(User $user)
    {
        $user->delete();
        return redirect(route('admin.index'));
    }
    public function destroyFestival(Festival $festival)
    {
        $festival->delete();
        return redirect(route('admin.index'));
    }
    public function destroyBusreis(Busreizen $busreis)
    {
        $busreis->delete();
        return redirect(route('admin.index'));
    }

    public function showUser(User $user)
    {

        $user->load('festivals');

        return view('admin.userInfo', ['user' => $user]);
    }

    public function showBusreis(Busreizen $busreis)
    {
        $route = [
            'origin' => $busreis->departure,
            'destination' => $busreis->arrival,
        ];
        return view('admin.busreisInfo', [
            'busreis' => $busreis,
            'route' => $route,
        ]);
    }


}
