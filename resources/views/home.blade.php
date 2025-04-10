@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Welcome to Floral Meath</h1>
        <p>This page is blank for now.</p>
    </div>

    <p>You are logged in as: {{ Auth::user()->email }}</p>

@endsection

