@extends('layouts.app')

@section('content')
    <h1>Edit Profil Merchant</h1>

    <form action="{{ route('merchants.update', $merchant->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="company_name">Nama Perusahaan:</label>
        <input type="text" name="company_name" id="company_name" value="{{ $merchant->company_name }}" required>

        <label for="address">Alamat:</label>
        <textarea name="address" id="address" required>{{ $merchant->address }}</textarea>

        <label for="contact">Kontak:</label>
        <input type="text" name="contact" id="contact" value="{{ $merchant->contact }}" required>

        <label for="description">Deskripsi:</label>
        <textarea name="description" id="description">{{ $merchant->description }}</textarea>

        <button type="submit">Update</button>
    </form>
@endsection
