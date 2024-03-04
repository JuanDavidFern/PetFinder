@extends('layout')

@section('content')
    <div class="p-24 bg-[#a7c4bc] ">

        <form method="POST" action="{{ route('register') }}" class="px-20">
            @csrf
            <div class="flex justify-center mb-4">
                <x-application-logo class="mx-auto " />
            </div>

            <!-- Name -->

            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Name</label>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                </div>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 "
                    placeholder="Adrian">
            </div>



            <!-- DNI -->

            <label for="dni" class="block mt-4 mb-2 text-sm font-medium text-gray-900">dni</label>
            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
            <div class="relative mb-4">
                <div class="absolute inset-y-0 left-0 flex items-center px-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 16">
                        <path
                            d="M16 0H4a2 2 0 0 0-2 2v1H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v2H1a1 1 0 0 0 0 2h1v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4.5a3 3 0 1 1 0 6 3 3 0 0 1 0-6ZM13.929 17H7.071a.5.5 0 0 1-.5-.5 3.935 3.935 0 1 1 7.858 0 .5.5 0 0 1-.5.5Z" />
                    </svg>
                </div>
                <input type="text" id="dni" name="dni" value="{{ old('dni') }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 py-2.5 "
                    placeholder="12345678A">
            </div>

            <!-- Email Address -->
            <label for="email" class="block mt-4 mb-2 text-sm font-medium text-gray-900">Email</label>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <div class="relative mb-4">
                <div class="absolute inset-y-0 left-0 flex items-center px-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 16">
                        <path
                            d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                        <path
                            d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                    </svg>
                </div>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 py-2.5 "
                    placeholder="name@gmail.com">
            </div>

            <!-- Password -->

            <label for="password" class="block mt-4 mb-2 text-sm font-medium text-gray-900">Password</label>
            <x-input-error :messages="$errors->get('password')" class="" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 0 0-1 1v1.586l-.293-.293a1 1 0 1 0-1.414 1.414l3 3a.999.999 0 0 0 1.414 0l3-3a1 1 0 0 0-1.414-1.414L11 5.586V4a1 1 0 0 0-1-1zm-1 10.586V17a1 1 0 0 0 2 0v-3.414l.293.293a1 1 0 1 0 1.414-1.414l-3-3a.999.999 0 0 0-1.414 0l-3 3a1 1 0 1 0 1.414 1.414l.293-.293z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="password" id="password" name="password" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 py-2.5"
                    placeholder="********">
            </div>

            <!-- Confirm Password -->

            <label for="password_confirmation" class="block mt-4 mb-2 text-sm font-medium text-gray-900">Password
                confirmation</label>
            <x-input-error :messages="$errors->get('password_confirmation')" class="" />
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5">
                    <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 3a1 1 0 0 0-1 1v1.586l-.293-.293a1 1 0 1 0-1.414 1.414l3 3a.999.999 0 0 0 1.414 0l3-3a1 1 0 0 0-1.414-1.414L11 5.586V4a1 1 0 0 0-1-1zm-1 10.586V17a1 1 0 0 0 2 0v-3.414l.293.293a1 1 0 1 0 1.414-1.414l-3-3a.999.999 0 0 0-1.414 0l-3 3a1 1 0 1 0 1.414 1.414l.293-.293z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 py-2.5"
                    placeholder="********">
            </div>

            <div class="flex justify-center mt-4">
                <div class="mt-4">
                    <a class="underline text-sm text-gray-600  hover:text-gray-900  rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 "
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
@endsection
