@extends('layout')

@section('content')
    <div class="bg-[#f0e3d2] p-8">
        <div class="grid grid-cols-2">
            <div>
                <img src="{{ asset($user->photo) }}" alt=""
                    class="w-56 max-h-56 max-w-56 min-h-56 min-w-56 mx-auto rounded-full">
            </div>
            <div class="p-4 rounded-lg text-center">
                <div class="text-left mb-8">
                    <h1 class="text-xl font-bold">Name: {{ $user->name }}</h1>
                </div>
                <div class="text-left mb-8">
                    <p class="text-gray-600">Email: {{ $user->email }}</p>
                </div>
                <div class="text-left">
                    <p class="text-gray-600">Creation Date: {{ $user->created_at }}</p>
                </div>
            </div>
        </div>
        <div class="rounded-lg border-2 border-[#E1A76F] mt-8">
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user->animals as $index => $animal)
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
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
