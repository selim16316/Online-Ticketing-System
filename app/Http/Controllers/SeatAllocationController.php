<?php

// app/Http/Controllers/SeatAllocationController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeatAllocation;

class SeatAllocationController extends Controller
{
    public function index()
    {
        // Retrieve and display all seat allocations
        $seatAllocations = SeatAllocation::all();

        return view('seat_allocations.index', compact('seatAllocations'));
    }

    public function show($id)
    {
        // Show details of a specific seat allocation
        $seatAllocation = SeatAllocation::find($id);

        if (!$seatAllocation) {
            return redirect('/seat-allocations')->with('error', 'Seat allocation not found.');
        }

        return view('seat_allocations.show', compact('seatAllocation'));
    }

    // Additional methods for updating, deleting, etc., as needed
}

