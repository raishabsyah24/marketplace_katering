@extends('layouts.app')

@section('content')
    <h1>Daftar Menu</h1>
    @foreach ($menus as $menu)
        <div>
            <h2>{{ $menu->name }}</h2>
            <p>{{ $menu->description }}</p>
            <p>Harga: {{ $menu->price }}</p>
            <a href="{{ route('menus.show', $menu->id) }}">Lihat Detail</a>
        </div>
    @endforeach
@endsection
