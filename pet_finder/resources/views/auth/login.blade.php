@extends('layout')

@section('content')
    {{-- style="background: linear-gradient(45deg, #c4dca9, #E1A76F, #DADBCD);" --}}
    <div class="p-24 bg-[#a7c4bc]">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="max-w-sm mx-auto">
            @csrf

            <div class="flex justify-center mb-4">
                <x-application-logo class="mx-auto " />
            </div>

            <label for="email-address-icon" class="block text-sm font-medium text-gray-900">Email address</label>
            <x-input-error :messages="$errors->get('email')" class="mt-2 mb-4 p-2 rounded-md" />

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
                <input type="email" id="email" name="email" :value="old('email')" required autofocus
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 py-2.5 "
                    placeholder="name@gmail.com">
            </div>


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

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 focus:ring-offset-gray-100"
                        name="remember">
                    <span class="ml-2 text-gray-700">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-center mt-6">
                <button type="submit"
                    class="bg-slate-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-slate-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500">Log
                    in</button>
            </div>
        </form>

        @if (Route::has('password.request'))
            <div class="text-center mt-4">
                <a class="text-slate-950 hover:text-slate-500" href="{{ route('password.request') }}">
                    Forgot Password?
                </a>
            </div>
        @endif
    </div>
@endsection


{{-- User

<x-guest-layout>
    

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
