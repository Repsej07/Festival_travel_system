<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Google Maps Route') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div>
                    <h3 class="text-lg font-bold mb-4">Route: {{$busreis->departure}} - {{$busreis->arrival}}</h3>
                    <div id="map" style="height: 400px; width: 100%;"></div>
                </div>
            </div>

            <div class="mt-5 justify-self-center">
                <a href="{{ route('admin.busreis.edit', $busreis->id) }}">
                    <button class="bg-Jesper p-2 rounded-md text-white w-[80vw] hover:bg-Jesper_light">Edit</button>
                </a>
                <form action="{{ route('admin.busreis.delete', $busreis->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this busreis?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 p-2 rounded-md text-white w-[80vw] hover:bg-red-700 mt-3">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.api_key') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Initialize map
            let map, directionsService, directionsRenderer;

            function initMap() {
                directionsService = new google.maps.DirectionsService();
                directionsRenderer = new google.maps.DirectionsRenderer();

                map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 7,                });

                directionsRenderer.setMap(map);

                // Laravel Route Data
                const route = @json($route);

                calculateRoute(route.origin, route.destination);
            }

            function calculateRoute(origin, destination) {
                const request = {
                    origin: origin,
                    destination: destination,
                    travelMode: google.maps.TravelMode.DRIVING, // Default Travel Mode
                };

                directionsService.route(request, (result, status) => {
                    if (status === "OK") {
                        directionsRenderer.setDirections(result);
                    } else {
                        console.error("Directions request failed due to " + status);
                    }
                });
            }

            initMap();
        });
    </script>



</x-app-layout>
