@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Shop Bouquets</h1>

    <div class="row">
        @foreach ($bouquets as $bouquet)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <a href="{{ route('bouquets.show', $bouquet->id) }}">
                        <img src="{{ asset('images/bouquets/' . $bouquet->image) }}" alt="{{ $bouquet->name }}" width="100">

                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $bouquet->name }}</h5>
                        <p class="card-text">€{{ $bouquet->price }}</p>
                        <p>{{ Str::limit($bouquet->description, 50) }}</p>
                        <a href="{{ route('bouquets.show', $bouquet->id) }}" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
