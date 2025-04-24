@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="section-title">Welcome to Floral Meath</h1>
    <p class="text-muted">Explore our beautiful bouquet selection</p>
</div>

<div class="text-center p-4 mb-4" style="background-color: #fff2f4; border-radius: 12px;">
    <h5 class="mb-2">📍 Visit Our Florist Shop</h5>
    <p class="mb-1">
        Find us at <strong>13 Watergate Street, Navan, Co. Meath</strong> – Eircode: <strong>C15 XY27</strong>
    </p>
    <a href="https://www.google.com/maps/search/?api=1&query=13+Watergate+Street,+Navan,+Co+Meath,+C15+XY27" target="_blank" class="btn btn-outline-dark mt-2">
        View on Google Maps
    </a>
</div>


<div class="divider"></div>

<!-- Summer Banner -->
<div class="banner banner-summer">
    <h2 class="display-6">🌸 Let Summer Bloom!</h2>
    <p class="fw-bold fs-5">
        Brighten your home or surprise someone special with our sunshine-inspired bouquets!
    </p>
</div>

<div class="row text-center mb-5">
    <div class="col-md-4">
    <a href="{{ route('bouquets.show', ['bouquet' => 4]) }}">
        <img src="{{ asset('images/bouquets/sunshinedelight.jpg') }}" class="img-fluid rounded shadow-sm mb-2 bouquet-img" alt="Sunshine Delight">
        <p><strong>Sunshine Delight</strong></p>
    </a>
    </div>
    <div class="col-md-4">
    <a href="{{ route('bouquets.show', ['bouquet' => 6]) }}">
        <img src="{{ asset('images/bouquets/peachperfect.jpg') }}" class="img-fluid rounded shadow-sm mb-2 bouquet-img" alt="Peach Perfect">
        <p><strong>Peach Perfect</strong></p>
    </a>
    </div>
    <div class="col-md-4">
    <a href="{{ route('bouquets.show', ['bouquet' => 5]) }}">
        <img src="{{ asset('images/bouquets/goldenhour.jpg') }}" class="img-fluid rounded shadow-sm mb-2 bouquet-img" alt="Golden Hour Glow">
        <p><strong>Golden Hour Glow</strong></p>
    </a>
    </div>
</div>

<!-- Most Wanted Section -->
<div class="my-5 text-center banner banner-most-wanted">
    <h2>👀 Shop Our Most Wanted</h2>
    <p class="fw-bold fs-5">
        These top picks are flying off the shelves — grab yours before they’re gone!
    </p>
</div>

<div class="d-flex justify-content-around flex-wrap">
    <div class="text-center m-3">
    <a href="{{ route('bouquets.show', ['bouquet' => 2]) }}">
        <img src="{{ asset('images/bouquets/blossom.jpg') }}" style="height: 200px;" class="rounded bouquet-img">
        <strong class="d-block mt-2">Blush Bestseller</strong>
    </a>

    </div>
    <div class="text-center m-3">
    <a href="{{ route('bouquets.show', ['bouquet' => 1]) }}">
        <img src="{{ asset('images/bouquets/spring.jpg') }}" style="height: 200px;" class="rounded bouquet-img">
        <strong class="d-block mt-2">Spring Surprise</strong>
    </a>

    </div>
    <div class="text-center m-3">
    <a href="{{ route('bouquets.show', ['bouquet' => 3]) }}">
        <img src="{{ asset('images/bouquets/valentine.jpg') }}" style="height: 200px;" class="rounded bouquet-img">
        <strong class="d-block mt-2">Love in the Air</strong>
    </a>

    </div>
</div>
@endsection
