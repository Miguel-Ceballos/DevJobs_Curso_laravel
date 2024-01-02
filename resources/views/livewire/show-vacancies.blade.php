@push('link')
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal/minimal.css" rel="stylesheet">
@endpush

<div class="">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @forelse($vacancies as $vacancy)
            <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                <div class="space-y-4">
                    <a href="{{ route('vacancies.show', $vacancy) }}" class="text-xl font-bold">
                        {{ $vacancy->title }}
                    </a>
                    <p class="text-sm text-gray-600 font-bold">{{ $vacancy->company }}</p>
                    <p class="text-sm text-gray-500">Last Day: {{ $vacancy->last_day->format('d/m/Y') }}</p>
                </div>

                <div class="flex flex-col gap-3 items-stretch mt-5 md:flex-row md:mt-0">
                    <a href="{{ route('candidate.index', $vacancy) }}"
                       class="bg-slate-800 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        {{ $vacancy->candidates->count() }} Candidates
                    </a>
                    <a href="{{ route('vacancies.edit', $vacancy) }}"
                       class="bg-blue-700 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Edit
                    </a>
                    <button
                        wire:click="$dispatch('showAlert', {{ $vacancy->id }})"
                        class="bg-red-600 py-2 px-4 rounded-lg text-white text-xs font-bold uppercase text-center">
                        Delete
                    </button>
                </div>
            </div>
        @empty
            <p class="p-3 text-center text-sm text-gray-600">There are no vacancies.</p>
        @endforelse
    </div>

    <div class="flex mt-10">
        {{ $vacancies->links() }}
    </div>
</div>

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.
            on('showAlert', idVacancy => {
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.
                        call('deleteVacancy', idVacancy)

                        Swal.fire({
                            title: "Deleted!",
                            text: "Your file has been deleted.",
                            icon: "success"
                        });
                    }
                });
            })
        });
    </script>

@endpush
