@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bouquet Details</h1>
    <p><strong>Name:</strong> {{ $bouquet->name }}</p>
    <p><strong>Price:</strong> ${{ $bouquet->price }}</p>
    <p><strong>Description:</strong> {{ $bouquet->description }}</p>
    <p><strong>Florist:</strong> {{ $bouquet->florist ? $bouquet->florist->name : 'N/A' }}</p>
    <a href="{{ route('bouquets.index') }}" class="btn btn-secondary">Back to Bouquets</a>
</div>
@endsection
