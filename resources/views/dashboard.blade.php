<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Escritorio') }}
        @section('title', 'ReciWeb - Escritorio')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    @if($hogar->rol == 1)
                        <livewire:welcomeadmin />
                    @else
                        <x-jet-welcome />
                    @endif              
            </div>
        </div>
    </div>
</x-app-layout>
