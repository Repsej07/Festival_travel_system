<div class="flex flex-row max-w-screen mt-10 justify-center">

    <div class="flex flex-row w-[80vw] justify-between" id="3_lower_blocks">
        <!-- Festivals Section -->
        <div class="w-80 h-128 bg-system_gray_light rounded-lg" x-data="{ open: false }"
            x-bind:style="open ? 'height: 36rem;' : 'height: 3rem;'">
            <div class="flex flex-row items-center mt-3 ml-3 cursor-pointer" @click="open = !open">
                <p class="font-bold mr-4">Festivals</p>
                <form action="{{ route('admin.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search"
                        class="w-45 h-6 bg-Jesper_light rounded-md text-white bg-search bg-no-repeat bg-left pl-5 placeholder-placeholder">
                </form>
                <span>
                    <img src="{{ url('/assets/dropdown_arrow.svg') }}" alt="arrow" class="ml-1"
                        :class="open ? 'rotate-0' : 'rotate-180'" style="transition: transform 0.3s;">
                </span>

            </div>
            <div x-show="open" x-transition>
                <div class="flex items-center mt-3 ml-2">
                    <a href="{{ route('admin.festivals.create') }}" class="flex items-center">
                        <img src="{{ url('/assets/create.svg') }}" alt="" class="mr-2">
                        Create
                    </a>
                </div>
                @if (isset($festivals) && count($festivals) > 0)
                    <ul class="overflow-scroll h-123 mt-1 rounded-lg">
                        @foreach ($festivals as $festival)
                            @if ($festival->status == 'active' || $festival->status == 'sold')
                                <div class="bg-Jesper_light text-black mt-2 rounded-lg p-1 mr-2 ml-2 h-54">
                                    <div class="flex flex-row mt-3 ml-3 mb-3">
                                        <li><img src="{{ asset("storage/{$festival->image}") }}" alt="Profile Picture"
                                                class="h-10 w-10 mr-5"></li>
                                        <li class="flex items-center">{{ $festival->name }}</li>
                                    </div>
                                    <hr class="border-1 border-black">

                                    <div class="flex flex-col items-start mt-3 ml-3">
                                        <li>Location: {{ $festival->location }}</li>
                                        <li>Date: {{ $festival->date }}</li>
                                        <li>Price: € {{ $festival->price }}</li>
                                        <li>Tickets left: {{ $festival->tickets }}</li>
                                        <div class="flex flex-row w-full">
                                            <li>Status: {{ $festival->status }}</li>
                                            <a href="{{ route('admin.festival.edit', $festival->id) }}" class="ml-auto mr-3"><img
                                                    src="{{ url('/assets/edit.svg') }}" alt="edit" class="float-right"></a>
                                        </div>
                                    </div>

                                </div>
                            @endif
                        @endforeach
                    </ul>
                @else
                    <p>No festivals found</p>
                @endif
            </div>
        </div>

        <!-- Busreizen Section -->
        <div class="bg-system_gray_light rounded-lg w-80" x-data="{ open: false }"
            x-bind:style="open ? 'height: 36rem;' : 'height: 3rem;'">
            <div class="flex flex-row items-center mt-3 ml-3 cursor-pointer" @click="open = !open">
                <p class="font-bold mr-4">Busreizen</p>
                <form action="{{ route('admin.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search"
                        class="w-45 h-6 bg-Jesper_light rounded-md text-white bg-search bg-no-repeat bg-left pl-5 placeholder-placeholder">
                </form>
                <span>
                    <img src="{{ url('/assets/dropdown_arrow.svg') }}" alt="arrow" class="ml-1"
                        :class="open ? 'rotate-0' : 'rotate-180'" style="transition: transform 0.3s;">
                </span>
            </div>
            <div x-show="open" x-transition>
                <div class="flex items-center mt-3 ml-2">
                    <a href="{{ route('admin.busreizen.create') }}" class="flex items-center">
                        <img src="{{ url('/assets/create.svg') }}" alt="" class="mr-2">
                        Create
                    </a>
                </div>
                @if (isset($busreizen) && count($busreizen) > 0)
                    <ul class="overflow-scroll h-123 mt-1 rounded-lg w-80">
                        @foreach ($busreizen as $busreis)
                            <div class="bg-Jesper_light text-black mt-2 rounded-lg p-1 mr-2 ml-2 h-54">
                                <div class="flex flex-row mt-3 ml-3 mb-3">
                                    <li>
                                    <li class="flex items-center">{{ $busreis->departure }} - {{ $busreis->arrival }}
                                    </li>
                                </div>
                                <hr class="border-1 border-black">
                                <div class="flex flex-col items-start mt-3 ml-3">
                                    <li>Departure: {{ $busreis->departure_date }} - {{ $busreis->departure_time }}
                                    </li>
                                    <li>Arrival: {{ $busreis->arrival_date }} - {{ $busreis->arrival_time }}</li>
                                    <li>Festival: {{ $busreis->festival->name ?? 'No festival assigned' }}</li>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                @else
                    <p>Geen busreizen beschikbaar</p>
                @endif
            </div>
        </div>

        <!-- Klanten Section -->
        <div class="bg-system_gray_light rounded-lg w-80" x-data="{ open: false }"
            x-bind:style="open ? 'height: 36rem;' : 'height: 3rem;'">
            <div class="flex flex-row items-center mt-3 ml-3 cursor-pointer" @click="open = !open">
                <p class="font-bold mr-4">Klanten</p>
                <form action="{{ route('admin.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search"
                        class="w-45 h-6 bg-Jesper_light rounded-md text-white bg-search bg-no-repeat bg-left pl-5 placeholder-placeholder">
                </form>
                <span>
                    <img src="{{ url('/assets/dropdown_arrow.svg') }}" alt="arrow" class="ml-4"
                        :class="open ? 'rotate-0' : 'rotate-180'" style="transition: transform 0.3s;">
                </span>
            </div>
            <div x-show="open" x-transition>
                <div class="flex items-center mt-3 ml-2">
                    <a href="{{ route('admin.user.create') }}" class="flex items-center">
                        <img src="{{ url('/assets/create.svg') }}" alt="" class="mr-2">
                        Create
                    </a>
                </div>
                @if (isset($users) && count($users) > 0)
                    <ul class="overflow-scroll h-123 mt-1 rounded-lg w-80">
                        @foreach ($users as $user)
                            <div class="bg-Jesper_light text-black mt-2 rounded-lg p-1 mr-2 ml-2 h-54">
                                <div class="flex flex-row mt-3 ml-3 mb-3">
                                    <li><img src="{{ asset("storage/{$user->profile_picture}") }}"
                                            alt="Profile Picture" class="h-10 w-10 rounded-full mr-5"></li>
                                    <li class="flex items-center">{{ $user->first_name }} {{ $user->last_name }}</li>
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
</div>
