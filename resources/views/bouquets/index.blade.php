@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bouquets</h1>
    <a href="{{ route('bouquets.create') }}" class="btn btn-primary mb-3">Add Bouquet</a>
    
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Florist</th>
                <th>Image</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach($bouquets as $bouquet)
            <tr>
                <td>{{ $bouquet->id }}</td>
                <td>{{ $bouquet->name }}</td>
                <td>{{ $bouquet->price }}</td>
                <td>{{ $bouquet->description }}</td>
                <td>{{ $bouquet->florist ? $bouquet->florist->name : 'N/A' }}</td>
                <td>
                    <img src="{{ asset('images/bouquets/' . $bouquet->image) }}" alt="{{ $bouquet->name }}" style="height: 70px;">
                </td>

                <td>
                    <a href="{{ route('bouquets.edit', $bouquet->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('bouquets.destroy', $bouquet->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
