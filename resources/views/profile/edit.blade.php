@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

        {{-- ✅ Past Orders --}}
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <h3 class="text-center mb-4 text-danger">Your Past Orders</h3>

            @if($orders->count())
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Bouquet</th>
                            <th>Order Date</th>
                            <th>Delivery Method</th>
                            <th>Pickup Date</th>
                            <th>Pickup Time</th>
                            <th>Special Requests</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->bouquet->name ?? 'N/A' }}</td>
                                <td>{{ \Carbon\Carbon::parse($order->order_date)->format('d M Y') }}</td>
                                <td>{{ ucfirst($order->delivery_method) }}</td>
                                <td>{{ $order->pickup_date ? \Carbon\Carbon::parse($order->pickup_date)->format('d M Y') : '—' }}</td>
                                <td>{{ $order->pickup_time ? \Carbon\Carbon::parse($order->pickup_time)->format('H:i') : '—' }}</td>
                                <td>{{ $order->special_requests ?? '—' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-muted text-center">You have no past orders yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
