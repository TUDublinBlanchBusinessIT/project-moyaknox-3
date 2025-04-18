@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Bouquet</h1>
    <form action="{{ route('bouquets.store') }}" method="POST" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Bouquet Name:</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price:</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="florist_id" class="form-label">Florist:</label>
            <select name="florist_id" id="florist_id" class="form-control">
                <option value="">Select Florist</option>
                @foreach($florists as $florist)
                    <option value="{{ $florist->id }}">{{ $florist->name }}</option>
                @endforeach
            </select>
            <div class="mb-3">
                <label for="image" class="form-label">Bouquet Image</label>
                <input type="file" name="image" id="image" class="form-control" required>
            </div>

        </div>
        <button type="submit" class="btn btn-success">Add Bouquet</button>
    </form>
</div>
@endsection
