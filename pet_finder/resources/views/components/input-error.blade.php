@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-red-600 space-y-1 font-bold text-md']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
