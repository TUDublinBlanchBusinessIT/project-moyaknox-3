@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Order</h1>
    <form action="{{ route('orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer:</label>
            <select name="customer_id" id="customer_id" class="form-control" required>
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="bouquet_id" class="form-label">Bouquet:</label>
            <select name="bouquet_id" id="bouquet_id" class="form-control" required>
                <option value="">Select Bouquet</option>
                @foreach($bouquets as $bouquet)
                    <option value="{{ $bouquet->id }}" {{ $order->bouquet_id == $bouquet->id ? 'selected' : '' }}>
                        {{ $bouquet->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="order_date" class="form-label">Order Date:</label>
            <input type="date" name="order_date" id="order_date" class="form-control" value="{{ $order->order_date }}" required>
        </div>
        <div class="mb-3">
            <label for="special_requests" class="form-label">Special Requests:</label>
            <textarea name="special_requests" id="special_requests" class="form-control">{{ $order->special_requests }}</textarea>
        </div>

        <div class="mb-3">
            <label for="delivery_method" class="form-label">Delivery Method</label>
            <select name="delivery_method" id="delivery_method" class="form-control" required>
                <option value="delivery" {{ $order->delivery_method === 'delivery' ? 'selected' : '' }}>Delivery</option>
                <option value="pickup" {{ $order->delivery_method === 'pickup' ? 'selected' : '' }}>Pickup In-Store</option>
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Update Order</button>
    </form>
</div>
@endsection
