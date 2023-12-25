<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bus_id',
        'location_id',
        'ticket_price',
        'status',
        'seat_number',
        'total_amount',

    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }


}

