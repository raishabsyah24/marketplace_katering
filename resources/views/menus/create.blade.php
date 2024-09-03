@extends('layouts.app')

@section('content')
    <h1>Buat Menu Baru</h1>

    <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nama Menu:</label>
        <input type="text" name="name" id="name" required>

        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description" required></textarea>

        <label for="price">Harga:</label>
        <input type="text" name="price" id="price" required>

        <label for="photo">Foto:</label>
        <input type="file" name="photo" id="photo" required>

        <button type="submit">Simpan</button>
    </form>
@endsection
