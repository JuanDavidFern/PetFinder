@extends('layout')

@section('content')
    <div class="relative">
        <!-- Imagen del animal -->
        <div class="h-96 flex items-center justify-center relative"> <!-- Ajusta la altura aquí -->
            <img src="{{ asset($animal->photo) }}" alt="{{ $animal->name }}" class="max-w-full max-h-full object-cover">

            <!-- Tarjeta con los datos del animal -->
            <div
                class="absolute bottom-[-2rem] left-1/2 transform -translate-x-1/2 bg-[#E1A76F] w-1/5 rounded-md p-2 shadow-md z-50">
                <h1 class="text-xl font-bold text-white">{{ $animal->name }}</h1>
                <h2 class="text-sm font-semibold mb-1 text-white">{{ $animal->type }}</h2>
                <p class="text-white">Age: {{ $animal->age }}</p>
            </div>
        </div>

        <!-- Títulos "Characteristics" e "Information" -->
        <div class="bg-white rounded-lg p-6 pt-8 relative z-10 grid grid-cols-1 gap-4">
            <h2 class="text-lg font-semibold mb-4">Characteristics:</h2>
            <!-- Características del animal -->
            <div class="grid grid-cols-1 gap-4">
                <div class="bg-[#445B2A] rounded-md p-4">
                    <p class="text-gray-100 mb-4">{{ $animal->characteristics }}</p>
                </div>
            </div>

            <h2 class="text-lg font-semibold mb-4">Information:</h2>
            <!-- Información del animal -->
            <div class="grid grid-cols-1 gap-4 mb-52">
                <div class="bg-[#445B2A] rounded-md p-4">
                    <p class="text-gray-100 mb-4">{{ $animal->information }}</p>
                </div>
            </div>

            <!-- Mostrar las imágenes de los patrocinadores -->
            <h2 class="text-lg font-semibold mb-4">Sponsors:</h2>
            <div class="flex items-center space-x-2">
                @php
                    $alreadySponsored = false;
                    $waitingSponsor = false;
                    $spons = false;
                    $sponsorCount = 0;
                    $confirmedSponsorCount = 0;
                @endphp
                @foreach ($animal->sponsors as $sponsor)
                    @if ($sponsorCount < 4 && $sponsor->pivot->status === 'confirmed')
                        <img src="{{ asset($sponsor->photo) }}" alt="{{ $sponsor->name }} Photo"
                            class="w-24 h-24 rounded-full">
                        @php $confirmedSponsorCount++; @endphp
                    @else
                        @if ($sponsorCount == 4 && $confirmedSponsorCount > 0)
                            <div
                                class="relative w-24 h-24 rounded-full flex items-center justify-center bg-gray-300 text-gray-600">
                                +{{ $animal->sponsors->count() - $confirmedSponsorCount }}
                            </div>
                        @endif
                    @endif
                    @auth
                        @if ($sponsor->id == Auth::user()->id)
                            @php
                                $spons = true;
                            @endphp
                            @if ($sponsor->pivot->status === 'pending')
                                @php
                                    $waitingSponsor = true;
                                @endphp
                            @elseif ($sponsor->pivot->status === 'confirmed')
                                @php
                                    $alreadySponsored = true;
                                @endphp
                            @endif
                        @endif
                    @endauth
                    @php $sponsorCount++; @endphp
                @endforeach
            </div>
            <!-- Tarjeta del propietario actual -->
            <div class="absolute bottom-5 right-7 bg-[#6D5136] rounded-lg p-4 max-w-96">
                <div class="flex items-center justify-between">
                    <a href="{{ route('user.profile', ['id' => $animal->currentOwner->id]) }}">
                        <div>
                            <h3 class="text-white text-lg font-semibold">{{ $animal->currentOwner->name }}</h3>
                            <p class="text-white mr-8">{{ $animal->currentOwner->email }}</p>
                        </div>
                    </a>
                    @auth
                        @if (Auth::user()->id != $animal->currentOwner->id)
                            @if (!$spons)
                                <form action="{{ route('sponsors.createSponsorRequest') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="animal_id" value="{{ $animal->id }}">
                                    <button type="submit" class="px-4 py-2 bg-[#E1A76F] text-white rounded-md mt-4">Sponsor
                                        Request</button>
                                </form>
                            @elseif ($alreadySponsored)
                                <p class="text-white">You already sponsored this animal</p>
                                <form
                                    action="{{ route('sponsors.finishSponsorRequestShow', ['sponsor' => Auth::user()->id, 'animal' => $animal]) }}"
                                    method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Finish
                                        Sponsor</button>
                                </form>
                            @elseif ($waitingSponsor)
                                <p class="text-white">Your sponsorship is waiting for confirmation</p>
                            @endif
                        @else
                            <p class="text-white">You are the owner</p>
                        @endif
                    @else
                        <p class="text-white">Register to sponsor</p>
                    @endauth
                </div>
                <img src="{{ asset($animal->currentOwner->photo) }}" alt="Owner Photo" class="mt-2 w-20 h-20 rounded-full">
            </div>
        </div>
    </div>
@endsection
