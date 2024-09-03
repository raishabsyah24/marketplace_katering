@extends('layouts.app')

@section('content')
    <h1>Edit Menu</h1>

    <form action="{{ route('menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Nama Menu:</label>
        <input type="text" name="name" id="name" value="{{ $menu->name }}" required>

        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description" required>{{ $menu->description }}</textarea>

        <label for="price">Harga:</label>
        <input type="text" name="price" id="price" value="{{ $menu->price }}" required>

        <label for="photo">Foto:</label>
        <input type="file" name="photo" id="photo">
        <img src="{{ asset('storage/' . $menu->photo) }}" alt="{{ $menu->name }}" width="100">

        <button type="submit">Update</button>
    </form>
@endsection
