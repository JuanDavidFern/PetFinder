<div class="relative">
    <img src="{{ $animal->photo }}" class="h-96" alt="{{ $animal->name }}">
    <div
        class="absolute top-0 left-0 w-full h-full p-4 opacity-0 transition-opacity duration-300 bg-black bg-opacity-50 text-white hover:opacity-100">
        <div class="">
            <div class="">
                <h5 class="text-xl mb-2">{{ $animal->name }} / {{ $animal->type }}</h5>
                <p>Age: {{ $animal->age }}</p>
                @php
                    if ($animal->characteristics > 500) {
                        echo '<p>Characteristics: ' . substr($animal->characteristics, 0, 500) . '...</p>';
                    } else {
                        echo '<p>Characteristics: ' . $animal->characteristics . '</p>';
                    }
                @endphp
            </div>
        </div>
    </div>
</div>
