@extends('layouts.app')

@section('content')
    <h1>Buat Pesanan Baru</h1>

    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <label for="menu_id">Menu:</label>
        <select name="menu_id" id="menu_id" required>
            @foreach ($menus as $menu)
                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
            @endforeach
        </select>

        <label for="quantity">Jumlah:</label>
        <input type="number" name="quantity" id="quantity" required>

        <label for="delivery_date">Tanggal Pengiriman:</label>
        <input type="date" name="delivery_date" id="delivery_date" required>

        <button type="submit">Simpan</button>
    </form>
@endsection
