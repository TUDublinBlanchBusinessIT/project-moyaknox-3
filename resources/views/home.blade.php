@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="section-title">Welcome to Floral Meath</h1>
    <p class="text-muted">Explore our beautiful bouquet selection</p>
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
        <img src="{{ asset('images/bouquets/sunshinedelight.jpg') }}" class="img-fluid bouquet-img mb-2" alt="Summer Bouquet 1">
        <p><strong>Sunshine Delight</strong></p>
    </div>
    <div class="col-md-4">
        <img src="{{ asset('images/bouquets/peachperfect.jpg') }}" class="img-fluid bouquet-img mb-2" alt="Summer Bouquet 2">
        <p><strong>Peach Perfect</strong></p>
    </div>
    <div class="col-md-4">
        <img src="{{ asset('images/bouquets/goldenhour.jpg') }}" class="img-fluid bouquet-img mb-2" alt="Summer Bouquet 3">
        <p><strong>Golden Hour Glow</strong></p>
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
        <img src="{{ asset('images/bouquets/blossom.jpg') }}" class="bouquet-img" style="height: 200px;">
        <strong class="d-block mt-2">Blush Bestseller</strong>
    </div>
    <div class="text-center m-3">
        <img src="{{ asset('images/bouquets/spring.jpg') }}" class="bouquet-img" style="height: 200px;">
        <strong class="d-block mt-2">Spring Surprise</strong>
    </div>
    <div class="text-center m-3">
        <img src="{{ asset('images/bouquets/valentine.jpg') }}" class="bouquet-img" style="height: 200px;">
        <strong class="d-block mt-2">Love in the Air</strong>
    </div>
</div>
@endsection
