
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Your Purchased Tickets</h2>

        @if (count($user->seatAllocations) > 0)
            <ul>
                @foreach ($user->seatAllocations as $allocation)
                    <li>
                        Trip Date: {{ $allocation->trip->date }},
                        Seat Number: {{ $allocation->seat_number }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>No purchased tickets yet.</p>
        @endif
    </div>
@endsection
