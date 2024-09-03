@extends('layouts.app')

@section('content')
    <h1>Buat Merchant Baru</h1>

    <form action="{{ route('merchants.store') }}" method="POST">
        @csrf
        <label for="company_name">Nama Perusahaan:</label>
        <input type="text" name="company_name" id="company_name" required>

        <label for="address">Alamat:</label>
        <textarea name="address" id="address" required></textarea>

        <label for="contact">Kontak:</label>
        <input type="text" name="contact" id="contact" required>

        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description"></textarea>

        <button type="submit">Simpan</button>
    </form>
@endsection
