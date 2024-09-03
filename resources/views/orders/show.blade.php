@extends('layouts.app')

@section('content')
    <h1>Pesanan #{{ $order->id }}</h1>
    <p>Menu: {{ $order->menu->name }}</p>
    <p>Jumlah: {{ $order->quantity }}</p>
    <p>Tanggal Pengiriman: {{ $order->delivery_date }}</p>
    <a href="{{ route('orders.edit', $order->id) }}">Edit Pesanan</a>
@endsection
