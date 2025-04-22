@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>Bouquet Details</h1>

    <div class="card mx-auto mb-4" style="max-width: 500px;">
    <img src="{{ asset('images/bouquets/' . $bouquet->image) }}" class="card-img-top img-fluid rounded shadow-sm" alt="{{ $bouquet->name }}" style="object-fit: cover; height: 350px;">
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
        <label for="delivery_method" class="form-label">Delivery Method</label>
        <select name="delivery_method" id="delivery_method" class="form-control" required>
            <option value="delivery">Delivery</option>
            <option value="pickup">Pickup In-Store</option>
        </select>
    </div>


        <!--  Address wrapper so we can hide it -->
    <div class="mb-3" id="addressField">
        <label for="address" class="form-label">Address</label>
        <textarea name="address" id="address" class="form-control" rows="2"></textarea>
    </div>
 

        <!-- Pickup Date and Time -->
    <div id="pickupDetails" style="display: none;">
        <div class="mb-3">
            <label for="pickup_date" class="form-label">Select Collection Date</label>
            <input type="date" name="pickup_date" id="pickup_date" class="form-control">
        </div>
        <div class="mb-3">
            <label for="pickup_time" class="form-label">Select Collection Time</label>
            <input type="time" name="pickup_time" id="pickup_time" class="form-control">
        </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deliverySelect = document.getElementById('delivery_method');
        const addressField = document.getElementById('addressField');
        const pickupDetails = document.getElementById('pickupDetails');

        function toggleFields() {
            if (deliverySelect.value === 'pickup') {
                addressField.style.display = 'none';
                pickupDetails.style.display = 'block';
            } else {
                addressField.style.display = 'block';
                pickupDetails.style.display = 'none';
            }
        }

        deliverySelect.addEventListener('change', toggleFields);
        toggleFields(); // Run once on page load
    });
</script>

@endsection
