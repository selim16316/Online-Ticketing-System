<?php

// app/Models/Trip.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = ['date', 'from_location_id', 'to_location_id', 'available_seats'];

    public function fromLocation()
    {
        return $this->belongsTo(Location::class, 'from_location_id');
    }

    public function toLocation()
    {
        return $this->belongsTo(Location::class, 'to_location_id');
    }

    public function seatAllocations()
    {
        return $this->hasMany(SeatAllocation::class);
    }
}
