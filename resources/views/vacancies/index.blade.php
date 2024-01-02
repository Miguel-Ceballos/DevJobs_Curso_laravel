<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Vacancies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session()->has('message'))
                <div class="border border-green-500 bg-green-100 text-green-700 p-2 my-2 text-sm rounded-md">
                    {{ session('message') }}
                </div>
            @endif

            <livewire:show-vacancies />

        </div>
    </div>
</x-app-layout>
