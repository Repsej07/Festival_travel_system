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
            <div>
                <ul>
                    @foreach ($festivals as $festival)
                        <li class="h-60 w-[98%] bg-system_gray_light mt-4 mx-auto rounded-lg flex flex-row">
                            <div class="ml-2 pt-2 mb-3 flex flex-col">
                                <h1 class="text-3xl">{{ $festival->name }}</h1>
                                <img src="{{ asset("storage/{$festival->image}") }}" alt="Festival Picture"
                                    class="h-40 w-40">
                            </div>
                            <div class="flex-grow w-[50%] flex items-center justify-end pr-4 mt-4 mx-auto overflow-hidden">
                                <span class="w-[100%] h-[60%] p-2">
                                    {{ \Illuminate\Support\Str::words($festival->description, 75, '...') }}</span>
                            </div>

                            <div>
                                <a href="{{ route('festival.info', ['festival' => $festival->id]) }}"
                                    class="bg-Jesper p-2 rounded-md text-white w-20 h-10 hover:bg-Jesper_light">Info</a>
                                <a href="{{route('festival.register', ['festival' => $festival->id, 'user' => Auth::user()->id])}}"
                                    class="bg-Jesper p-2 rounded-md text-white w-20 h-10 hover:bg-Jesper_light">Register</a>

                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>





        </div>
    </div>

</div>

</div>
