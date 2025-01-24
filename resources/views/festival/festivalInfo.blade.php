<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="w-[80vw] h-160 bg-background_grey mx-auto mt-5 rounded-lg">
        <div class="flex flex-col p-5 space-y-5">
            <div>
                <p class="font-bold text-6xl">{{ $festival->name }}</p>
                <p class="">{{ $festival->date }} - € {{$festival->price}}</p>
            </div>
            <div class="flex flex-row"><img src="{{ url('/assets/location_pin.svg') }}" alt=""
                    class="mr-2">{{ $festival->location }} </div>
            </div>
            <div class="flex flex-row">
                <img src="{{ asset("storage/{$festival->image}") }}" alt="Festival Picture" class="h-96 max-h-30 mr-5 ml-3 rounded-lg">
                <textarea class="w-[50vw] max-h-96 ml-40 bg-transparent border-none resize-none outline-none"  disabled
                readonly>{{$festival->description}}</textarea>
            </div>

        </div>

    </div>

</x-app-layout>
