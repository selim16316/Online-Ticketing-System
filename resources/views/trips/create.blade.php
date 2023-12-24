

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create a Trip</h2>

        <form method="post" action="{{ route('trips.store') }}">
            @csrf

            <label for="date">Trip Date:</label>
            <input type="date" name="date" required>

            <label for="from">From:</label>
            <input type="text" name="from" required>

            <label for="to">To:</label>
            <input type="text" name="to" required>

            <button type="submit">Create Trip</button>
        </form>
    </div>
@endsection
