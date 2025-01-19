<x-app-layout>
    <x-slot name="header">
    </x-slot>
    <x-adminDashboard :users="$users" :festivals="$festivals" :busreizen="$busreizen">
    </x-adminDashboard>
</x-app-layout>

