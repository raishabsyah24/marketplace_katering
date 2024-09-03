@extends('layouts.app')

@section('content')
    <h1>Invoice #{{ $invoice->id }}</h1>
    <p>Pesanan: {{ $invoice->order->menu->name }}</p>
    <p>Jumlah: {{ $invoice->order->quantity }}</p>
    <p>Total: {{ $invoice->total_amount }}</p>
@endsection
