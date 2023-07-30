<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenueTimeTable extends Model
{
    use HasFactory;
    protected $table='venue_timetable';
    protected $fillable=[
        'venue_id',
        'start_time',
        'end_time',
        'day'
    ];

}
