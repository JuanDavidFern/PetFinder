@extends('layout')

@section('content')
    @livewire('update-animal', ['animal' => $animal])
@endsection
