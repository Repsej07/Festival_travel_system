<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="flex flex-row max-w-screen mt-10 justify-center overflow-hidden">
    <div class="flex flex-row w-[80vw] justify-between" id="3_lower_blocks">
        <!-- Festivals Section -->
        <div class="w-80 h-128 bg-system_gray_light rounded-lg" x-data="{ open: false }" id="main_content"
            x-bind:style="open ? 'height: 36rem;' : 'height: 3rem;'">
            <div class="flex flex-row items-center mt-3 ml-3 cursor-pointer"">
                <p class="font-bold mr-4">Festivals</p>
                <input type="text" name="search" id="search_festivals" placeholder="Search festivals..."
                    class="w-45 h-6 bg-Jesper_light rounded-md text-white bg-search bg-no-repeat bg-left pl-5 placeholder-placeholder">
                <span @click="open = !open">
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
                    <ul class="overflow-scroll h-123 mt-1 rounded-lg" id="all_festivals">
                        @foreach ($festivals as $festival)
                            @if ($festival->status == 'active' || $festival->status == 'sold')
                                <div class="bg-Jesper_light text-black mt-2 rounded-lg p-1 mr-2 ml-2 h-54">
                                    <div class="flex flex-row mt-3 ml-3 mb-3">
                                        <li><img src="{{ asset("storage/{$festival->image}") }}" alt="Festival Picture"
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
                                            <a href="{{ route('admin.festival.edit', $festival->id) }}"
                                                class="ml-auto mr-3"><img src="{{ url('/assets/edit.svg') }}"
                                                    alt="edit" class="float-right">
                                            </a>
                                            <form action="{{ route('admin.festival.delete', $festival->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this festival?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <img src="{{ url('/assets/delete.svg') }}" alt="delete"
                                                        class="float-right">
                                                </button>

                                                <a href="{{ route('festival.info', $festival->id) }}">
                                                    <img src="{{ url('/assets/info.svg') }}" alt="info"
                                                        class="h-6 w-6">
                                                </a>
                                        </div>
                                    </div>

                                </div>
                            @endif
                        @endforeach

                    </ul>
                    <ul class="overflow-scroll h-123 mt-1 rounded-lg">
                        <li id="searched_festivals">
                        </li>

                    </ul>
                @else
                    <p>No festivals found</p>
                @endif
            </div>
        </div>

        <!-- Busreizen Section -->
        <div class="bg-system_gray_light rounded-lg w-80" x-data="{ open: false }"
            x-bind:style="open ? 'height: 36rem;' : 'height: 3rem;'">
            <div class="flex flex-row items-center mt-3 ml-3 cursor-pointer">
                <p class="font-bold mr-4">Busreizen</p>
                <input type="text" id="search_busreizen" placeholder="Search"
                    class="w-45 h-6 bg-Jesper_light rounded-md text-white bg-search bg-no-repeat bg-left pl-5 placeholder-placeholder">
                <span>
                    <img src="{{ url('/assets/dropdown_arrow.svg') }}" alt="arrow" class="ml-1"
                        :class="open ? 'rotate-0' : 'rotate-180'" style="transition: transform 0.3s;"
                        @click="open = !open">
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
                    <ul class="overflow-scroll h-123 mt-1 rounded-lg w-80" id="all_busreizen">
                        @foreach ($busreizen as $busreis)
                            <div class="bg-Jesper_light text-black mt-2 rounded-lg p-1 mr-2 ml-2 h-46">
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
                                    <div class="flex flex-row justify-between items-end w-full">
                                        <!-- Optional additional details here -->
                                        <a href="{{ route('admin.busreis.edit', $busreis->id) }}"
                                            class="ml-auto mb-1 mr-3">
                                            <img src="{{ url('/assets/edit.svg') }}" alt="edit"
                                                class="object-right-bottom">
                                        </a>

                                        <form action="{{ route('admin.busreis.delete', $busreis->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this busreis?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <img src="{{ url('/assets/delete.svg') }}" alt="delete"
                                                    class="object-right-bottom">
                                            </button>
                                        </form>

                                        <a href="{{ route('admin.busreis.info', $busreis->id) }}">
                                            <img src="{{ url('/assets/info.svg') }}" alt="info" class="h-6 w-6">
                                        </a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </ul>
                    <ul class="overflow-scroll h-123 mt-1 rounded-lg">
                        <li id="searched_busreizen">
                        </li>

                    </ul>
                @else
                    <p>Geen busreizen beschikbaar</p>
                @endif
            </div>
        </div>

        <!-- Klanten Section -->
        <div class="bg-system_gray_light rounded-lg w-80" x-data="{ open: false }"
            x-bind:style="open ? 'height: 36rem;' : 'height: 3rem;'">
            <div class="flex flex-row items-center mt-3 ml-3 cursor-pointer">
                <p class="font-bold mr-4">Klanten</p>
                <input type="text" id="search_users" placeholder="Search"
                    class="w-45 h-6 bg-Jesper_light rounded-md text-white bg-search bg-no-repeat bg-left pl-5 placeholder-placeholder">
                <span>
                    <img src="{{ url('/assets/dropdown_arrow.svg') }}" alt="arrow" class="ml-4"
                        :class="open ? 'rotate-0' : 'rotate-180'" style="transition: transform 0.3s;"
                        @click="open = !open">
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
                    <ul class="overflow-scroll h-123 mt-1 rounded-lg w-80" id="all_users">
                        @foreach ($users as $user)
                            <div class="bg-Jesper_light text-black mt-2 rounded-lg p-1 mr-2 ml-2 h-46">
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
                                <div class="flex flex-row items-center justify-end w-full space-x-4">
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin.user.edit', $user->id) }}">
                                        <img src="{{ url('/assets/edit.svg') }}" alt="edit" class="h-6 w-6">
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <img src="{{ url('/assets/delete.svg') }}" alt="delete"
                                                class="h-6 w-6">
                                        </button>
                                    </form>

                                    <a href="{{ route('admin.user.info', $user->id) }}">
                                        <img src="{{ url('/assets/info.svg') }}" alt="info" class="h-6 w-6">
                                    </a>
                                </div>

                            </div>
                        @endforeach
                    </ul>
                    <ul class="overflow-scroll h-123 mt-1 rounded-lg">
                        <li id="searched_users">
                        </li>

                    </ul>
                @else
                    <p>Geen klanten gevonden</p>
                @endif
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#search_festivals').on('keyup', function() {
        $value = $(this).val();
        if ($value) {
            $('#all_festivals').hide();
            $('#searched_festivals').show();
        } else {
            $('#all_festivals').show();
            $('#searched_festivals').hide();
        }

        $.ajax({

            type: 'get',
            url: '{{ URL::to('/admin/searchfestivals') }}',
            data: {
                'search': $value
            },

            success: function(data) {
                console.log(data);

                $('#searched_festivals').html(data);

            }


        })
    })

    $('#search_busreizen').on('keyup', function() {
        $value = $(this).val();
        if ($value) {
            $('#all_busreizen').hide();
            $('#searched_busreizen').show();
        } else {
            $('#all_busreizen').show();
            $('#searched_busreizen').hide();
        }

        $.ajax({
            type: 'get',
            url: '{{ URL::to('/admin/searchbusreizen') }}',
            data: {
                'search': $value
            },
            success: function(data) {
                console.log(data);
                $('#searched_busreizen').html(data);
            }
        });
    });

    $('#search_users').on('keyup', function() {
        $value = $(this).val();
        if ($value) {
            $('#all_users').hide();
            $('#searched_users').show();
        } else {
            $('#all_users').show();
            $('#searched_users').hide();
        }

        $.ajax({
            type: 'get',
            url: '{{ URL::to('/admin/searchusers') }}',
            data: {
                'search': $value
            },
            success: function(data) {
                console.log(data);
                $('#searched_users').html(data);
            }
        });
    });
</script>
