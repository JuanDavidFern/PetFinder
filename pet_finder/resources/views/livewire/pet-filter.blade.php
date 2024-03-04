<div class="bg-white rounded-lg p-4" style="background: linear-gradient(45deg, #445B2A, #E1A76F, #DADBCD);">
    <div class="flex items-center justify-end mb-4">
        <input type="text" wire:model.live="filterText" @if ($filterType == 'sponsors_count_desc' || $filterType == 'sponsors_count_asc') readonly @endif
            class="p-2 border border-gray-300 rounded-md mr-2 focus:outline-none w-80" placeholder="Search here">
        <button wire:click="toggleFilterButtons"
            class="px-4 py-2 bg-[#d5803a] text-white rounded-md hover:bg-yellow-700 focus:outline-none focus:ring focus:ring-yellow-500">Filter</button>
    </div>
    <div class="flex justify-end">
        <div class="mt-2">
            <button wire:click="changeFilterType('name')" wire:loading.attr="disabled"
                class="mr-2 px-4 py-2 bg-[#d5803a] text-white rounded-md hover:bg-yellow-700 focus:outline-none focus:ring focus:ring-yellow-500 @if (!$showFilterButtons) hidden @endif">Name</button>
            <button wire:click="changeFilterType('type')" wire:loading.attr="disabled"
                class="mr-2 px-4 py-2 bg-[#d5803a] text-white rounded-md hover:bg-yellow-700 focus:outline-none focus:ring focus:ring-yellow-500 @if (!$showFilterButtons) hidden @endif">Type</button>
            <button wire:click="changeFilterType('age')" wire:loading.attr="disabled"
                class="mr-2 px-4 py-2 bg-[#d5803a] text-white rounded-md hover:bg-yellow-700 focus:outline-none focus:ring focus:ring-yellow-500 @if (!$showFilterButtons) hidden @endif">Age</button>
            <button wire:click="changeFilterType('sponsors_count_asc')" wire:loading.attr="disabled"
                class="mr-2 px-4 py-2 bg-[#d5803a] text-white rounded-md hover:bg-yellow-700 focus:outline-none focus:ring focus:ring-yellow-500 @if (!$showFilterButtons) hidden @endif">
                Ascending
            </button>
            <button wire:click="changeFilterType('sponsors_count_desc')" wire:loading.attr="disabled"
                class="mr-2 px-4 py-2 bg-[#d5803a] text-white rounded-md hover:bg-yellow-700 focus:outline-none focus:ring focus:ring-yellow-500 @if (!$showFilterButtons) hidden @endif">
                Descending
            </button>
        </div>
    </div>
    <div class="grid grid-cols-3 gap-4 mt-4">
        @foreach ($animals as $animal)
            <a href="{{ route('animals.show', [$animal]) }}" class="w-full">
                <div class="bg-gray-200 rounded-lg p-4">
                    <x-animal-card :animal="$animal" />
                </div>
            </a>
        @endforeach
    </div>
</div>
