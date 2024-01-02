<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold text-center mb-10">My notifications</h1>
                    <div class="divide-y divide-gray-200">
                        @forelse($notifications as $notification )
                            <div class="p-5 lg:flex lg:justify-between lg:items-center">
                                <div class="">
                                    <p class="">Yo have new candidate on: <span
                                            class="font-bold">{{ $notification->data['vacancy_name'] }}</span>
                                    </p>
                                    <p class="font-bold text-sm text-gray-500">{{ $notification->created_at->diffForHumans() }}.</p>
                                </div>
                                <div class="mt-5 lg:mt-0">
                                    <a href="{{ route('candidate.index', $notification->data['vacancy_id']) }}" class="uppercase text-sm bg-gray-800 text-white p-2 rounded-md">
                                        Show candidates
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-600">Not exist notifications.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
