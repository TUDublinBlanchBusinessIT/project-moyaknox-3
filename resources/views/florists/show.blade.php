@extends('layouts.app')

@section('content')
<div class="container">
   <h1>Florist Details</h1>
   <p><strong>Name:</strong> {{ $florist->name }}</p>
   <p><strong>Email:</strong> {{ $florist->email }}</p>
   <p><strong>Phone:</strong> {{ $florist->phone }}</p>
   <p><strong>Address:</strong> {{ $florist->address }}</p>
   <a href="{{ route('florists.index') }}" class="btn btn-secondary">Back to Florists</a>
</div>
@endsection
