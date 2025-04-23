@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        {{-- Profile Info --}}
        <div class="p-4 bg-white border rounded shadow-sm">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- Password --}}
        <div class="p-4 bg-white border rounded shadow-sm">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- Delete Account --}}
        <div class="p-4 bg-white border rounded shadow-sm">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

        {{-- Past Orders --}}
        <div class="p-4 bg-white border rounded shadow-sm">
            <h3 class="text-center mb-4" style="color: #ff69b4; font-weight: bold;">Your Past Orders</h3>

            @if($orders->count())
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover text-center align-middle shadow-sm rounded">
                        <thead class="table-warning">
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
                                    <td>
                                        @if($order->delivery_method === 'pickup' && $order->pickup_date)
                                            {{ \Carbon\Carbon::parse($order->pickup_date)->format('d M Y') }}
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>
                                        @if($order->delivery_method === 'pickup' && $order->pickup_time)
                                            {{ \Carbon\Carbon::parse($order->pickup_time)->format('H:i') }}
                                        @else
                                            —
                                        @endif
                                    </td>
                                    <td>{{ $order->special_requests ?? '—' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-muted text-center">You have no past orders yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection
