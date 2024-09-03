@extends('layouts.app')

@section('content')
    <h1>{{ $menu->name }}</h1>
    <p>{{ $menu->description }}</p>
    <p>Harga: {{ $menu->price }}</p>
    <img src="{{ asset('storage/' . $menu->photo) }}" alt="{{ $menu->name }}" width="200">
    <a href="{{ route('menus.edit', $menu->id) }}">Edit Menu</a>
@endsection
