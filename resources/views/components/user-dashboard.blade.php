<div class="py-12">
    <div class="w-full mx-auto sm:px-6 lg:px-8">
        <div class="bg-system_gray shadow-sm sm:rounded-lg h-144 overflow-scroll">
            <div class="bg-system_gray_light w-full h-14 shadow-sm sm:rounded-t-lg flex sticky top-0">
                <div class="w-full h-14 flex justify-between">
                    <h1 class="text-3xl content-center ml-5 font-inter font-bold text-Jesper">Festivals</h1>
                    <input type="text"
                        class="w-1/2 h-10 mr-2 mt-2 bg-Jesper_light rounded-md text-white bg-search bg-no-repeat bg-left pl-5 placeholder-placeholder"
                        placeholder="Search for festivals">
                </div>
            </div>
            <div @if (isset($festivals) && count($festivals) > 0) <ul>
                    @foreach ($festivals as $festival)
                        @if ($festival->status == 'active')
                            <li class="h-60 w-[98%] bg-system_gray_light mt-4 mx-auto rounded-lg flex flex-row">
                                <div class="ml-2 pt-2 mb-3 flex flex-col">
                                    <h1 class="text-3xl">{{ $festival->name }}</h1>
                                    <img src="{{ asset("storage/{$festival->image}") }}" alt="Festival Picture"
                                        class="h-40 w-40">
                                </div>
                                <div
                                    class="flex-grow w-[50%] flex items-center justify-end pr-4 mt-4 mx-auto overflow-hidden">
                                    <span class="w-[100%] h-[60%] p-2">
                                        {{ \Illuminate\Support\Str::words($festival->description, 75, '...') }}</span>
                                </div>

                                <div class="flex flex-row w-50 h-60 items-end justify-end ">
                                    <a href="{{ route('festival.info', ['festival' => $festival->id]) }}"
                                        class="bg-Jesper p-2 rounded-md text-white w-24 h-10 text-center hover:bg-Jesper_light mb-2 mr-2">Info</a>

                                    @if ($festival->users->contains(Auth::user()->id))
                                        <a href="{{ route('festival.unregister', ['festival' => $festival->id, 'user' => Auth::user()->id]) }}"
                                            class="bg-red-500 p-2 rounded-md text-white w-24 h-10 text-center hover:bg-red-700 mb-2 mr-2">Unregister</a>
                                    @else
                                        <a href="{{ route('festival.register', ['festival' => $festival->id, 'user' => Auth::user()->id]) }}"
                                            class="bg-Jesper p-2 rounded-md text-white w-24 h-10 text-center hover:bg-Jesper_light mb-2 mr-2">Register</a>
                                    @endif
                                </div>


                </li>
                @endif
                @endforeach
                </ul>
            @else
                <div class="flex justify-center items-center h-96">
                    <h1 class="text-3xl font-bold">No festivals available</h1>
                    @endif
                </div>





            </div>
        </div>

    </div>

</div>
