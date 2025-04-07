@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Bouquet</h1>
    <form action="{{ route('bouquets.update', $bouquet->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Bouquet Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $bouquet->name }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $bouquet->price }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" class="form-control">{{ $bouquet->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="florist_id" class="form-label">Florist:</label>
            <select name="florist_id" id="florist_id" class="form-control">
                <option value="">Select Florist</option>
                @foreach($florists as $florist)
                    <option value="{{ $florist->id }}" {{ $bouquet->florist_id == $florist->id ? 'selected' : '' }}>
                        {{ $florist->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Bouquet</button>
    </form>
</div>
@endsection
