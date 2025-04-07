@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Order</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="customer_id" class="form-label">Customer:</label>
            <select name="customer_id" id="customer_id" class="form-control" required>
                <option value="">Select Customer</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="bouquet_id" class="form-label">Bouquet:</label>
            <select name="bouquet_id" id="bouquet_id" class="form-control" required>
                <option value="">Select Bouquet</option>
                @foreach($bouquets as $bouquet)
                    <option value="{{ $bouquet->id }}">{{ $bouquet->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="order_date" class="form-label">Order Date:</label>
            <input type="date" name="order_date" id="order_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="special_requests" class="form-label">Special Requests:</label>
            <textarea name="special_requests" id="special_requests" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Order</button>
    </form>
</div>
@endsection
