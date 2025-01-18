<div class="flex flex-row max-w-screen mt-10 justify-center">

    <div class="flex flex-row w-[80vw] h-144 justify-between" id="3_lower_blocks">
        <div class="w-80 h-128 bg-system_gray_light rounded-lg">
            <div class="flex flex-row items-center mt-3 ml-3">
                <p class="font-bold mr-4">Festivals</p>
                <form action="{{ route('admin.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search"
                        class="w-45 h-6 bg-Jesper_light rounded-md text-white bg-search bg-no-repeat bg-left pl-5 placeholder-placeholder">
                </form>
                <span><img src="{{ url('/assets/dropdown_arrow.svg') }}" alt="arrow" class="ml-1"></span>
            </div>
            @if (isset($festivals) && count($festivals) > 0)
                <ul class="overflow-scroll h-114 mt-4 rounded-lg">
                    @foreach ($festivals as $festival)
                        <div class="bg-Jesper_light text-black mt-2 rounded-lg p-1 mr-2 ml-2  ">
                            <div class="flex flex-row  mt-3 ml-3 mb-3">
                                {{-- <li><img src="{{ asset('storage/' }}" alt="Profile Picture" --}}
                                {{-- class="h-10 w-10 rounded-full mr-5"></li> --}}
                                <li class=" flex  items-center">{{ $festival->name }}</li>
                            </div>
                            <hr class="border-1 border-black">
                            <div class="flex flex-col items-start mt-3 ml-3">
                                <li>Location: {{ $festival->location }}</li>
                                <li>Date:  {{ $festival->date }}</li>
                                <li>Price: € {{ $festival->price }}</li>
                                <li>Tickets left: {{$festival->tickets}}</li>
                                <li>Status: {{$festival->status}}</li>
                            </div>
                        </div>
                    @endforeach
                </ul>
            @else
                <p>No festivals found</p>
            @endif
        </div>
        <div class="w-80 h-128 bg-system_gray_light rounded-lg">
            <div class="flex flex-row items-center mt-3 ml-3">
                <p class="font-bold mr-4">Busreizen</p>
                <form action="{{ route('admin.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search"
                        class="w-45 h-6 bg-Jesper_light rounded-md text-white bg-search bg-no-repeat bg-left pl-5 placeholder-placeholder">
                </form>
                <span><img src="{{ url('/assets/dropdown_arrow.svg') }}" alt="arrow" class="ml-1"></span>
            </div>
            @if (isset($users) && count($users) > 0)
                <ul class="overflow-scroll h-114 mt-4 rounded-lg">
                    @foreach ($users as $user)
                        <div class="bg-Jesper_light text-black mt-2 rounded-lg p-1 mr-2 ml-2  ">
                            <div class="flex flex-row  mt-3 ml-3 mb-3">
                                <li><img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture"
                                        class="h-10 w-10 rounded-full mr-5"></li>
                                <li class=" flex  items-center">{{ $user->first_name }} {{ $user->last_name }}</li>
                            </div>
                            <hr class="border-1 border-black">
                            <div class="flex flex-col items-start mt-3 ml-3">
                                <li>Username: {{ $user->username }} {{ $user->points }}pts</li>
                                <li>Email: {{ $user->email }}</li>
                                <li>Admin: @if ($user->admin)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </li>
                            </div>
                        </div>
                    @endforeach
                </ul>
            @else
                <p>Geen busreizen beschikbaar</p>
            @endif
        </div>
        <div class="w-80 h-128 bg-system_gray_light rounded-lg">
            <div class="flex flex-row items-center mt-3 ml-3">
                <p class="font-bold mr-4">Klanten</p>
                <form action="{{ route('admin.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search"
                        class="w-45 h-6 bg-Jesper_light rounded-md text-white bg-search bg-no-repeat bg-left pl-5 placeholder-placeholder">
                </form>
                <span><img src="{{ url('/assets/dropdown_arrow.svg') }}" alt="arrow" class="ml-1"></span>
            </div>
            @if (isset($users) && count($users) > 0)
                <ul class="overflow-scroll h-114 mt-4 rounded-lg">
                    @foreach ($users as $user)
                        <div class="bg-Jesper_light text-black mt-2 rounded-lg p-1 mr-2 ml-2  ">
                            <div class="flex flex-row  mt-3 ml-3 mb-3">
                                <li><img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture"
                                        class="h-10 w-10 rounded-full mr-5"></li>
                                <li class=" flex  items-center">{{ $user->first_name }} {{ $user->last_name }}</li>
                            </div>
                            <hr class="border-1 border-black">
                            <div class="flex flex-col items-start mt-3 ml-3">
                                <li>Username: {{ $user->username }} {{ $user->points }}pts</li>
                                <li>Email: {{ $user->email }}</li>
                                <li>Admin: @if ($user->admin)
                                        Yes
                                    @else
                                        No
                                    @endif
                                </li>
                            </div>
                        </div>
                    @endforeach
                </ul>
            @else
                <p>Geen klanten gevonden</p>
            @endif
        </div>
    </div>
</div>
