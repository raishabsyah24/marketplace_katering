@extends('layouts.app')

@section('content')
    <h1>Daftar Invoice</h1>
    @foreach ($invoices as $invoice)
        <div>
            <h2>Invoice #{{ $invoice->id }}</h2>
            <p>Total: {{ $invoice->total_amount }}</p>
            <a href="{{ route('invoices.show', $invoice->id) }}">Lihat Detail</a>
        </div>
    @endforeach
@endsection
