@extends('layouts.app')

@section('content')
    <h1>Daftar Merchant</h1>
    @foreach ($merchants as $merchant)
        <div>
            <h2>{{ $merchant->company_name }}</h2>
            <p>{{ $merchant->description }}</p>
            <a href="{{ route('merchants.show', $merchant->id) }}">Lihat Detail</a>
        </div>
    @endforeach
@endsection
