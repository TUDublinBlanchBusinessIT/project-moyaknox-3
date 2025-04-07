@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Florists</h1>
    <a href="{{ route('florists.create') }}" class="btn btn-primary mb-3">Add Florist</a>
    
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
      <thead>
         <tr>
           <th>ID</th>
           <th>Name</th>
           <th>Email</th>
           <th>Phone</th>
           <th>Address</th>
           <th>Actions</th>
         </tr>
      </thead>
      <tbody>
         @foreach($florists as $florist)
         <tr>
            <td>{{ $florist->id }}</td>
            <td>{{ $florist->name }}</td>
            <td>{{ $florist->email }}</td>
            <td>{{ $florist->phone }}</td>
            <td>{{ $florist->address }}</td>
            <td>
               <a href="{{ route('florists.edit', $florist->id) }}" class="btn btn-warning btn-sm">Edit</a>
               <form action="{{ route('florists.destroy', $florist->id) }}" method="POST" style="display:inline-block;">
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
