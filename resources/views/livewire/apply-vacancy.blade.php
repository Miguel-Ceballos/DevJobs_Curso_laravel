<div class="bg-gray-100 p-5 mt-10 flex flex-col justify-center items-center rounded-lg">
    <h3 class="text-center text-2xl font-bold my-4 text-gray-800">Apply for this vacancy</h3>

    @if(session()->has('message'))
        <p class="uppercase border border-green-500 bg-green-100 text-green-700 text-sm font-bold p-2 my-4 rounded-lg">
            {{ session('message') }}
        </p>
    @else
        <form wire:submit.prevent="apply">
            <div class="my-2">
                <x-input-label for="cv" :value="__('Curriculum (PDF)')"/>
                <input type="file" accept=".pdf" wire:model="cv" id="cv" class="block mt-3 w-full">
            </div>
            @error('cv')
            <livewire:show-error :message="$message"/>
            @enderror

            <x-primary-button class="my-5">
                {{ __('Apply') }}
            </x-primary-button>

        </form>
    @endif


</div>
