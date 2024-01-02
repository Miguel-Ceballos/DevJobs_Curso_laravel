<div class="p-10">
    <div class="mb-5">
        <h3 class="font-bold text-3xl text-gray-800 my-3">{{ $vacancy->title }}</h3>

        <div class="md:grid md:grid-cols-2 bg-gray-50 p-2 rounded mb-8">
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Empresa: <span
                    class="normal-case font-normal">{{ $vacancy->company }}</span></p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Last day to apply : <span
                    class="normal-case font-normal">{{ $vacancy->last_day->toFormattedDateString() }}</span></p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Category: <span
                    class="normal-case font-normal">{{ $vacancy->category->category }}</span></p>
            <p class="font-bold text-sm uppercase text-gray-800 my-3">Salary: <span
                    class="normal-case font-normal">{{ $vacancy->salary->salary }}</span></p>
        </div>

        <div class="md:grid md:grid-cols-6 gap-4">
            <div class="md:col-span-2">
                <img src="{{ asset('storage/vacancies/' . $vacancy->image) }}"
                     alt="{{ 'Image vacancy ' . $vacancy->title  }}">
            </div>
            <div class="md:col-span-4">
                <h2 class="text-1xl font-bold mb-4">Description:</h2>
                <p class="">{{ $vacancy->description }}</p>
            </div>
        </div>

        @guest
            <div class="mt-8 bg-gray-50 border border-dashed p-4 text-center">
                <p class="">To apply for this and many other vacancies, you must
                    <a href="{{ route('register') }}" class="font-semibold text-blue-600 cursor-pointer">create an account.</a>
                </p>
            </div>
        @endguest

        @cannot('create', \App\Models\Vacancy::class)
            <livewire:apply-vacancy :vacancy="$vacancy"/>
        @endcannot

    </div>
</div>
