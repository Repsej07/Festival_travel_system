<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <x-adminDashboard :users="$users" :festivals="$festivals">
    </x-adminDashboard>
</x-app-layout>

