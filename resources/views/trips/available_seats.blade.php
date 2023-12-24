
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Available Seats for {{ $trip->date }}</h2>

        @if (count($availableSeats) > 0)
            <p>Select a seat to purchase:</p>
            <ul>
                @foreach ($availableSeats as $seat)
                    <li>
                        <a href="{{ route('trips.purchase', ['tripId' => $trip->id, 'seatNumber' => $seat]) }}">
                            Seat {{ $seat }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No available seats for this trip.</p>
        @endif
    </div>
@endsection
