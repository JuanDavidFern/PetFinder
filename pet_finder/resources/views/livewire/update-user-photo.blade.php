<div class="p-8 grid grid-cols-1 justify-center">
    @if ($this->photo)
        <img class="w-56 max-h-56 max-w-56 min-h-56 min-w-56 mx-auto" src="{{ $this->photo->temporaryUrl() }}"
            alt="">
    @else
        <img class="w-56 max-h-56 max-w-56 min-h-56 min-w-56 mx-auto" src="{{ asset(Auth::user()->photo) }}"
            alt="">
    @endif
    <form action="{{ route('profile.updatePhoto') }}" method="POST" class="grid grid-cols-1"
        enctype="multipart/form-data">
        @csrf
        @method('patch')
        <label for="photo"
            class="cursor-pointer flex items-center justify-center bg-[#E1A76F] hover:bg-[#b47f4e] text-white font-bold py-2 px-4 rounded">
            <span>Select a photo</span>
            <input type="file" wire:model="photo" id="photo" name="photo" class="hidden">
        </label>
        <div class="flex justify-end mt-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</div>
