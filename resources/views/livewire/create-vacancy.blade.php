<form action="" method="post" class="md:w-1/2 space-y-4" wire:submit.prevent="createVacancy">
    <div>
        <x-input-label
            for="title"
            :value="__('Vacancy title')"
        />
        <x-text-input
            id="title"
            class="block mt-1 w-full"
            type="text"
            wire:model="title"
            placeholder="Vacancy title"
            :value="old('title')"
        />
        @error('title')
            <livewire:show-error :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label
            for="salary"
            :value="__('Salary')"
        />
        <select id="salary"
                wire:model="salary"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
            <option value="">-- Select salary --</option>
            @foreach($salaries as $salary)
                <option value="{{$salary->id}}">{{ $salary->salary }}</option>
            @endforeach
        </select>
        @error('salary')
        <livewire:show-error :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label
            for="category"
            :value="__('Category')"
        />
        <select id="category" ç
                wire:model="category"
                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
            <option value="">-- Select category --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach
        </select>
        @error('category')
        <livewire:show-error :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label
            for="company"
            :value="__('Company')"
        />
        <x-text-input
            id="company"
            class="block mt-1 w-full"
            type="text"
            wire:model="company"
            :value="old('company')"
            placeholder="Company name"
        />
        @error('company')
        <livewire:show-error :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label
            for="last_day"
            :value="__('Last day')"
        />
        <x-text-input
            id="last_day"
            class="block mt-1 w-full"
            type="date"
            wire:model="last_day"
            :value="old('last_day')"
        />
        @error('last_day')
        <livewire:show-error :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label
            for="description"
            :value="__('Description')"
        />
        <textarea id="description"
                  wire:model="description"
                  class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full h-72"
        ></textarea>
        @error('description')
        <livewire:show-error :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label
            for="image"
            :value="__('Vacancy image')"
        />
        <x-text-input
            id="image"
            class="block mt-1 w-full"
            type="file"
            wire:model="image"
            accept="image/*"
        />

        <div class="my-5 w-72">
            @if($image)
                Image:
                <img src="{{ $image->temporaryUrl() }}" alt="">
            @endif
        </div>

        @error('image')
        <livewire:show-error :message="$message" />
        @enderror

        <div class="flex flex-row-reverse">
            <x-primary-button class="my-8">
                {{ __('Publish Vacancy') }}
            </x-primary-button>
        </div>
    </div>
</form>
