<x-app-layout>
    <div class="bg-white">
        <x-slot name="header">
            <h2 class="font-semibold text-xlleading-tight">
                {{ __('Profile') }}
            </h2>
        </x-slot>
        @if (session('status'))
            <div class="flex justify-center items-center">
                <div class="p-4 mb-3 mt-8 text-sm text-green-700 bg-slate-300 rounded-lg text-center w-1/5">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 bg-slate-200 shadow grid grid-cols-2">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                    <div>
                        <h2 class="text-lg font-medium text-gray-900 flex justify-end">
                            {{ __('Update user photo') }}
                        </h2>
                        @livewire('update-user-photo')
                    </div>
                </div>

                <div class="p-4  bg-slate-200 shadow">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 bg-slate-200 shadow">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
