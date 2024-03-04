<nav class="bg-[#E1A76F]">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('index') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src={{ asset('storage/logo.jpg') }} class="h-12 rounded-full" alt="Logo de pet finder" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Pet finder</span>
        </a>
        @auth
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">

            </div>
        @else
            <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <a href="{{ route('login') }}"
                    class="font-semibold text-white hover:text-gray-300  focus:outline focus:outline-2 mr-4">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 font-semibold text-white hover:text-gray-300  focus:outline focus:outline-2">Register</a>
                @endif
            </div>
        @endauth
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 ">
                {{-- <li>
                    <a href="{{ route('index') }}"
                        class="block py-2 text-white bg-[#E1A76F] hover:text-gray-300  focus:outline focus:outline-2"
                        aria-current="page">Home</a>
                </li> --}}
                @auth
                    <li>
                        <a href="{{ route('animals.create') }}"
                            class="block py-2 text-white bg-[#E1A76F] hover:text-gray-300  focus:outline focus:outline-2"
                            aria-current="page">New animal</a>
                    </li>
                    <li>
                        <a href="{{ route('animals.myAnimals') }}"
                            class="block py-2 text-white bg-[#E1A76F] hover:text-gray-300  focus:outline focus:outline-2"
                            aria-current="page">My animals</a>
                    </li>
                    <li>
                        <a href="{{ route('animals.mySponsoredsAnimals') }}"
                            class="block py-2 text-white bg-[#E1A76F] hover:text-gray-300  focus:outline focus:outline-2"
                            aria-current="page">My sponsoreds animals</a>
                    </li>
                    @php
                        $animals = Auth::user()->animals;
                        $cont = 0;
                        foreach ($animals as $animal) {
                            foreach ($animal->sponsors as $key => $value) {
                                $value->pivot->status === 'pending' ? $cont++ : '';
                            }
                        }
                    @endphp
                    <li>
                        <a href="{{ route('user.requests') }}"
                            class="block py-2 text-white bg-[#E1A76F] hover:text-gray-300  focus:outline focus:outline-2"
                            aria-current="page">Requests - {{ $cont }}</a>
                    </li>
                    <li>
                        <a href="{{ route('profile.edit') }}"
                            class="block py-2 text-white bg-[#E1A76F] hover:text-gray-300  focus:outline focus:outline-2"
                            aria-current="page">Profile</a>
                    </li>
                    @if (Auth::user()->admin)
                        <li>
                            <a href="{{ route('user.admin') }}"
                                class="block py-2 text-white bg-[#E1A76F] hover:text-gray-300  focus:outline focus:outline-2"
                                aria-current="page">Manage users</a>
                        </li>
                    @endif
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" href="{{ route('logout') }}"
                                class="block py-2 text-white bg-[#E1A76F] hover:text-gray-300  focus:outline focus:outline-2"
                                aria-current="page">Log out</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
