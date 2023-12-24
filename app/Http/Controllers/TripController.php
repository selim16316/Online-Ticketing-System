<?php
// app/Http/Controllers/TripController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\SeatAllocation;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function create()
    {
        return view('trips.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'from' => 'required|string',
            'to' => 'required|string',
        ]);

        Trip::create([
            'date' => $request->input('date'),
            'from_location' => $request->input('from'),
            'to_location' => $request->input('to'),
        ]);

        return redirect('/trips/create')->with('success', 'Trip created successfully!');
    }

    public function showAvailableSeats(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
        ]);

        $date = $request->input('date');

        $trip = Trip::where('date', $date)->first();

        if (!$trip) {
            return redirect('/')->with('error', 'No trip available on the specified date.');
        }

        $bookedSeats = SeatAllocation::where('trip_id', $trip->id)->pluck('seat_number')->toArray();

        $availableSeats = range(1, $trip->available_seats);

        foreach ($bookedSeats as $bookedSeat) {
            if (($key = array_search($bookedSeat, $availableSeats)) !== false) {
                unset($availableSeats[$key]);
            }
        }

        return view('trips.available_seats', compact('trip', 'availableSeats'));
    }

    public function purchaseTicket(Request $request, $tripId, $seatNumber)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', 'Please log in to purchase a ticket.');
        }

        $trip = Trip::find($tripId);

        if (!$trip || $trip->available_seats <= 0) {
            return redirect('/')->with('error', 'Invalid trip or no available seats.');
        }

        $alreadyBooked = SeatAllocation::where('trip_id', $tripId)->where('seat_number', $seatNumber)->exists();

        if ($alreadyBooked) {
            return redirect('/')->with('error', 'Seat already booked.');
        }

        SeatAllocation::create([
            'user_id' => $user->id,
            'trip_id' => $tripId,
            'seat_number' => $seatNumber,
        ]);

        $trip->decrement('available_seats');

        return redirect('/')->with('success', 'Ticket purchased successfully!');
    }
}
