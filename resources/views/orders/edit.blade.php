@extends('layouts.app')

@section('content')
    <h1>Edit Pesanan</h1>

    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="menu_id">Menu:</label>
        <select name="menu_id" id="menu_id" required>
            @foreach ($menus as $menu)
                <option value="{{ $menu->id }}" @if($menu->id == $order->menu_id) selected @endif>{{ $menu->name }}</option>
            @endforeach
        </select>

        <label for="quantity">Jumlah:</label>
        <input type="number" name="quantity" id="quantity" value="{{ $order->quantity }}" required>

        <label for="delivery_date">Tanggal Pengiriman:</label>
        <input type="date" name="delivery_date" id="delivery_date" value="{{ $order->delivery_date }}" required>

        <button type="submit">Update</button>
    </form>
@endsection
