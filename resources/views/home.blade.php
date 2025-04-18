@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Welcome to Floral Meath</h1>
        <p class="text-muted">Explore our beautiful bouquet selection</p>
    </div>

    <div class="p-4 mb-4 text-white text-center rounded" style="background-color: #FFD700;">
    <h2 class="display-6">🌸 Let Summer Bloom!</h2>
    <p class="lead">Brighten your home or surprise someone special with our sunshine-inspired bouquets!</p>
</div>

<div class="row text-center">
    <div class="col-md-4">
        <img src="{{ asset('images/bouquets/sunshinedelight.jpg') }}" class="img-fluid rounded shadow-sm mb-2" alt="Summer Bouquet 1">
        <p><strong>Sunshine Delight</strong></p>
    </div>
    <div class="col-md-4">
        <img src="{{ asset('images/bouquets/peachperfect.jpg') }}" class="img-fluid rounded shadow-sm mb-2" alt="Summer Bouquet 2">
        <p><strong>Peach Perfect</strong></p>
    </div>
    <div class="col-md-4">
        <img src="{{ asset('images/bouquets/goldenhour.jpg') }}" class="img-fluid rounded shadow-sm mb-2" alt="Summer Bouquet 3">
        <p><strong>Golden Hour Glow</strong></p>
    </div>
</div>


    <div class="container">
    <!--<h1 class="text-2xl font-bold mb-6 text-center">Welcome to Floral Meath</h1>-->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($bouquets as $bouquet)
                <div class="bg-white p-4 rounded shadow-md text-center">
                    <img src="{{ asset('images/bouquets/' . $bouquet->image) }}" alt="{{ $bouquet->name }}" class="mx-auto h-64 w-full object-cover rounded shadow-md">
                    <h2 class="mt-4 text-xl font-semibold">{{ $bouquet->name }}</h2>
                    <p class="text-gray-600 mt-1">{{ $bouquet->description }}</p>
                    <p class="text-pink-600 font-bold mt-2">€{{ number_format($bouquet->price, 2) }}</p>
                </div>
            @endforeach
        </div>
    </div>

@endsection

