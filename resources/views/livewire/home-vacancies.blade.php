<div>

    <livewire:filter-vacancies />

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-3xl text-gray-800 mb-12 px-6">Vacancies available</h3>

            <div class="bg-white shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse($vacancies as $vacancy)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a href="{{ route('vacancies.show', $vacancy) }}" class="text-2xl font-bold text-gray-800">
                                {{ $vacancy->title }}</a>
                            <p class="text-base font-semibold text-gray-600 mb-2">{{ $vacancy->company }}</p>
                            <p class="text-base font-semibold text-gray-600 mb-2">{{ $vacancy->category->category }}</p>
                            <p class="text-base font-semibold text-gray-600 mb-2">{{ $vacancy->salary->salary }}</p>
                            <p class="text-base text-gray-400 mb-4">Last day for apply: {{ $vacancy->last_day->format('d/m/Y') }}</p>
                        </div>
                        <div class="">
                            <a href="{{route('vacancies.show', $vacancy )}}" class="uppercase text-sm bg-gray-800 text-white p-2 rounded-md">
                                Show vacancy
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600">There are no vacancies available.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
