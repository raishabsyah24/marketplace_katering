@extends('layouts.app')

@section('content')
    <h1>Daftar Pesanan</h1>
    @foreach ($orders as $order)
        <div>
            <h2>Pesanan {{ $order->id }}</h2>
            <p>Menu: {{ $order->menu->name }}</p>
            <p>Jumlah: {{ $order->quantity }}</p>
            <p>Tanggal Pengiriman: {{ $order->delivery_date }}</p>
            <a href="{{ route('orders.show', $order->id) }}">Lihat Detail</a>
        </div>
    @endforeach
@endsection
