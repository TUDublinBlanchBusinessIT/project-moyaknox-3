@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Search Results</h1>

    @if($bouquets->isEmpty())
        <div class="alert text-center mt-5 p-4" style="background-color: #ffe6ee; border-radius: 12px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
            <h5 class="mb-2" style="color: #d63384;">🌸 Oops! No bouquets found.</h5>
            <p class="text-muted mb-0">Try searching for a different name or browse our full selection in the <a href="{{ route('bouquets.shop') }}" class="text-decoration-underline" style="color: #ff69b4;">shop</a>.</p>
        </div>
    @else
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
    @endif
</div>
@endsection
