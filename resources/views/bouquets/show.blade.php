@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bouquet Details</h1>

    <div class="card mb-4" style="max-width: 500px;">
    <img src="{{ asset('images/bouquets/' . $bouquet->image) }}" class="img-fluid rounded shadow-sm my-3" alt="{{ $bouquet->name }}" style="max-height: 300px;">
        <div class="card-body">
            <h5 class="card-title"><strong>{{ $bouquet->name }}</strong></h5>
            <p class="card-text"><strong>Price:</strong> €{{ $bouquet->price }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $bouquet->description }}</p>
        </div>
    </div>

    @auth
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf
            <input type="hidden" name="bouquet_id" value="{{ $bouquet->id }}">
            <input type="hidden" name="order_date" value="{{ \Carbon\Carbon::now()->toDateString() }}">

            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" id="phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" id="address" class="form-control" rows="2" required></textarea>
            </div>

            <div class="mb-3">
                <label for="special_requests" class="form-label">Special Requests</label>
                <textarea name="special_requests" id="special_requests" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Log in</a> to place an order.</p>
    @endauth

    <a href="{{ route('bouquets.shop') }}" class="btn btn-dark mt-3">Back to Bouquets</a>
</div>
@endsection
