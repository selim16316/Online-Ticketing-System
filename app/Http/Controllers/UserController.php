<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userTickets()
    {
        $user = Auth::user();

        return view('users.tickets', compact('user'));
    }
}

