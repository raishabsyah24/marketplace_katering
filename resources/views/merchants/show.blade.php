@extends('layouts.app')

@section('content')
    <h1>{{ $merchant->company_name }}</h1>
    <p>{{ $merchant->description }}</p>
    <p>Alamat: {{ $merchant->address }}</p>
    <p>Kontak: {{ $merchant->contact }}</p>
    <a href="{{ route('merchants.edit', $merchant->id) }}">Edit Profil</a>
@endsection
