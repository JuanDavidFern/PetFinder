@extends('layout')

@section('content')
    <div class="bg-[#f0e3d2] p-8">
        <h1 class="text-3xl font-bold text-center my-8 text-[#445B2A]">────── Manage ──────</h1>
        <h1 class="text-3xl font-bold text-center my-8 text-[#E1A76F]">Your Sponsors</h1>

        @if (session('message'))
            <div class="flex justify-center items-center">
                <div class="p-4 mb-4 text-sm text-green-700 bg-[#ffffff] rounded-lg text-center w-1/5">
                    {{ session('message') }}
                </div>
            </div>
        @endif
        @if (Auth::user()->sponsoredAnimals->count() == 0)
            <div class="flex justify-center items-center h-[200px]">
                <div class="text-center">
                    <a href="{{ route('index') }}">
                        <p class="text-3xl font-bold text-[#445B2A]">U dont have sponsoreds animals</p>
                    </a>
                </div>
            </div>
        @else
            <div class="rounded-lg border-2 border-[#E1A76F]">
                <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Animal name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Age
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Edit
                            </th>
                        </tr>
                    </thead>
                    @php
                        $index = 0;
                    @endphp
                    @foreach (Auth::user()->sponsoredAnimals as $animal)
                        <tbody>
                            <tr class="{{ $index % 2 == 0 ? 'bg-[#98af7e]' : 'bg-[#E1A76F]' }} hover:bg-[#d6c7b9]">
                                <th scope="row" class="px-6 py-4 font-medium text-black">
                                    <a href="{{ route('animals.show', [$animal]) }}" class="w-full">{{ $animal->name }}</a>
                                </th>
                                <td class="px-6 py-4 text-black">
                                    {{ $animal->age }}
                                </td>
                                <td class="px-6 py-4 text-black">
                                    {{ $animal->type }}
                                </td>
                                <td class="px-6 py-4 text-black">
                                    {{ $animal->pivot->status }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($animal->pivot->status == 'confirmed')
                                        <form
                                            action="{{ route('sponsors.finishSponsor', ['sponsor' => Auth::user()->id, 'animal' => $animal->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Finish
                                                Sponsor</button>
                                        </form>
                                    @else
                                        <form
                                            action="{{ route('sponsors.finishSponsorRequestMyEsponsoredsAnimals', ['sponsor' => Auth::user()->id, 'animal' => $animal->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Delete
                                                request?</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                        @php
                            $index++;
                        @endphp
                    @endforeach

                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Animal name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Age
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Type
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Edit
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        @endif

    </div>
@endsection
