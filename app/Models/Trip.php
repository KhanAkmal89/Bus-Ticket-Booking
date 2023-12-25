<?php

namespace App\Models;

use App\Http\Controllers\CategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;


    protected $fillable = [
        'departure_date',
        'location_id',
        'bus_id',
        'from_location',
        'to_location',

    ];


    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
