@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bouquet Details</h1>

    <div class="card mb-4" style="max-width: 500px;">
        <img src="{{ asset('images/bouquets/' . $bouquet->image) }}" class="card-img-top" alt="{{ $bouquet->name }}">

        <div class="card-body">
            <h5 class="card-title"><strong>{{ $bouquet->name }}</strong></h5>
            <p class="card-text"><strong>Price:</strong> €{{ $bouquet->price }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $bouquet->description }}</p>
            <!--<p class="card-text"><strong>Florist:</strong> {{ $bouquet->florist->name ?? 'N/A' }}</p> -->
        </div>
    </div>

    @auth
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf
            <input type="hidden" name="bouquet_id" value="{{ $bouquet->id }}">
            <input type="hidden" name="order_date" value="{{ \Carbon\Carbon::now()->toDateString() }}">

            <div class="mb-3">
                <label for="special_requests" class="form-label">Special Requests</label>
                <textarea name="special_requests" id="special_requests" class="form-control" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Log in</a> to place an order.</p>
    @endauth

    <br>
    <a href="{{ route('bouquets.shop') }}" class="btn btn-dark mt-3">Back to Bouquets</a>
</div>
@endsection

