<div class="bg-[#f4f4f4] p-8 px-40">
    <!-- resources/views/livewire/nuevo-animal.blade.php -->

    <div>
        <form action="{{ route('animals.store') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="grid grid-cols-2 gap-6">
                <div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" wire:model="name" placeholder=" " id="name" name="name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#E1A76F] peer">
                        <label for="name"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#E1A76F] peer-focus:dark:text-[#E1A76F] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                        @error('name')
                            <span class="text-[#E1A76F]">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" wire:model="type" placeholder=" " id="type" name="type"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#E1A76F] peer">
                        <label for="type"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#E1A76F] peer-focus:dark:text-[#E1A76F] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Type</label>
                        @error('name')
                            <span class="text-[#E1A76F]">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <input type="number" wire:model="age" placeholder=" " id="age" name="age"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#E1A76F] peer">
                        <label for="age"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#E1A76F] peer-focus:dark:text-[#E1A76F] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Age</label>
                        @error('name')
                            <span class="text-[#E1A76F]">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <textarea type="text" wire:model="characteristics" placeholder=" " id="characteristics" name="characteristics"
                            rows="3"
                            class="resize-none block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#E1A76F] peer"></textarea>
                        <label for="characteristics"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#E1A76F] peer-focus:dark:text-[#E1A76F] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Characteristics</label>
                        @error('characteristics')
                            <span class="text-[#E1A76F]">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <textarea type="text" wire:model="information" placeholder=" " id="information" name="information" rows="3"
                            class="resize-none block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#E1A76F] peer"></textarea>
                        <label for="information"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#E1A76F] peer-focus:dark:text-[#E1A76F] peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Information</label>
                        @error('information')
                            <span class="text-[#E1A76F]">{{ $message }}</span>
                        @enderror
                    </div>
                    <input type="file" wire:model="photo" placeholder="Foto" name="photo" id="photo">
                    @error('photo')
                        <span class="text-[#E1A76F]">{{ $message }}</span>
                    @enderror

                </div>
                <div class="p-20 flex items-center justify-center bg-[#f0e3d2]">
                    @if ($photo)
                        <img class="w-64 h-64" src="{{ $photo->temporaryUrl() }}">
                    @endif
                </div>
            </div>

            <div class="flex justify-center mt-16">
                <button type="submit"
                    class="text-white bg-[#E1A76F] hover:bg-[#b47f4e] focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center">
                    Create animal
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
</div>
