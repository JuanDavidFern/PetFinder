@extends('layout')

@section('content')
    <div class="bg-[#f0e3d2] p-8">
        <h1 class="text-3xl font-bold text-center my-8 text-[#445B2A]">────── Manage ──────</h1>
        <h1 class="text-3xl font-bold text-center my-8 text-[#E1A76F]">Your Pets</h1>

        @if (session('message'))
            <div class="flex justify-center items-center">
                <div class="p-4 mb-4 text-sm text-green-700 bg-[#ffffff] rounded-lg text-center w-1/5">
                    {{ session('message') }}
                </div>
            </div>
        @endif
        @if (Auth::user()->animals->count() == 0)
            <div class="flex justify-center items-center h-[200px]">
                <div class="text-center">
                    <a href="{{ route('animals.create') }}">
                        <p class="text-3xl font-bold text-[#E1A76F]">U dont have animals</p>
                        <p class="text-3xl font-bold text-[#445B2A]">Add one animal</p>
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
                                Last updated
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Edit
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($animals as $index => $animal)
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
                                    {{ $animal->updated_at }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('animals.edit', [$animal]) }}"><button type="button"
                                            class="text-white bg-blue-400 hover:bg-blue-400 focus:ring-4 focus:ring-blue-400 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 ">Edit</button></a>
                                    <form action="{{ route('animals.destroy', [$animal]) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
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
                                Last updated
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
