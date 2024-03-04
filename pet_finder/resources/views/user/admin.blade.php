@extends('layout')

@section('content')
    <div class="bg-[#f0e3d2] p-8">
        <h1 class="text-3xl font-bold text-center my-8 text-[#445B2A]">────── Manage ──────</h1>
        <h1 class="text-3xl font-bold text-center my-8 text-[#E1A76F]">Users</h1>

        @if (session('message'))
            <div class="flex justify-center items-center">
                <div class="p-4 mb-4 text-sm text-green-700 bg-[#ffffff] rounded-lg text-center w-1/5">
                    {{ session('message') }}
                </div>
            </div>
        @endif
        <div class="rounded-lg border-2 border-[#E1A76F]">
            <table class="w-full text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            DNI
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Verified
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr class="{{ $index % 2 == 0 ? 'bg-[#98af7e]' : 'bg-[#E1A76F]' }} hover:bg-[#d6c7b9]">
                            <th scope="row" class="px-6 py-4 font-medium text-black">
                                <a href="{{ route('user.profile', ['id' => $user->id]) }}"> {{ $user->name }}</a>
                            </th>
                            <td class="px-6 py-4 text-black">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 text-black">
                                {{ $user->dni }}
                            </td>
                            <td class="px-6 py-4 text-black">
                                @if ($user->email_verified_at)
                                    User verified
                                @else
                                    User not verified
                                @endif
                            </td>
                            <td class="px-6 py-4 text-black font-bold">
                                @if ($user->admin)
                                    Admin
                                @else
                                    <form action="{{ route('profile.promoteToAdmin', ['user' => $user]) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('patch')
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Promote
                                            to admin</button>
                                    </form>
                                    <form action="{{ route('profile.deleteOtherUser', ['user' => $user]) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="focus:outline-none text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            DNI
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Verified
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Edit
                        </th>
                    </tr>
                </thead>
            </table>
        </div>

    </div>
@endsection
