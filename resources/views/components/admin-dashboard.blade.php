<div class="flex flex-row max-w-screen mt-10 justify-center">

    <div class="flex flex-row w-[80vw] h-144 justify-between" id="3_lower_blocks">
        <div class="w-80 h-128 bg-system_gray_light rounded-lg">
            <div class="flex flex-row items-center mt-3 ml-3">
                <p class="font-bold mr-4">Festivals</p>
                <form action="{{ route('admin.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search" class="w-45 h-6 bg-Jesper_light rounded-md text-white bg-search bg-no-repeat bg-left pl-5 placeholder-placeholder">
                </form>
                <span><img src="{{ url('/assets/dropdown_arrow.svg') }}" alt="arrow" class="ml-1"></span>
            </div>
            {{-- @if (isset($results) && count($results) > 0)
            <ul>
                @foreach ($results as $result)
                    <li>{{ $result->first_name }}</li>
                @endforeach
            </ul>

        @endif --}}

        </div>
        <div class="w-80 h-128 bg-system_gray_light rounded-lg"></div>
        <div class="w-80 h-128 bg-system_gray_light rounded-lg"></div>
    </div>
</div>
