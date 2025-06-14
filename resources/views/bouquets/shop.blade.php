@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Shop Bouquets</h1>

    <div class="row">
        @if($bouquets->isEmpty())
            <div class="alert text-center mt-5 p-4" style="background-color: #ffe6ee; border-radius: 12px; box-shadow: 0 2px 5px rgba(0,0,0,0.05);">
                <h5 class="mb-2" style="color: #d63384;">🌸 Oops! No bouquets found.</h5>
                <p class="text-muted mb-0">Try searching for a different name or browse our full selection in the <a href="{{ route('bouquets.shop') }}" class="text-decoration-underline" style="color: #ff69b4;">shop</a>.</p>
            </div>
        @endif



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

@if(session('order_success'))
<!-- Order Confirmation Modal -->
<div class="modal fade" id="orderSuccessModal" tabindex="-1" aria-labelledby="orderSuccessLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="orderSuccessLabel">Order Placed!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Thanks <strong>{{ session('customer_name') }}</strong>, your order has been placed successfully!</p>

        @if(session('delivery_method') === 'delivery')
            <p>Your expected delivery date is <strong>{{ \Carbon\Carbon::now()->addDays(2)->toFormattedDateString() }}</strong>.</p>
        @else
            <p>Your order will be ready for collection on <strong>{{ session('pickup_date') }}</strong> at <strong>{{ session('pickup_time') }}</strong>.</p>
        @endif
      </div>
    </div>
  </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', function () {
        var orderModal = new bootstrap.Modal(document.getElementById('orderSuccessModal'));
        orderModal.show();
    });
</script>
@endif


@endsection
