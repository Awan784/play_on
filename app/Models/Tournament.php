<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;
    protected $table="tournament";
    protected $fillable=[
        'venue_id',
        'date',
        'start_time',
        'end_time',
        'name',
        'created_by',
        'entry_fee',
        'prize'
    ];
    public function venue(){
        return $this->belongsTo(Venue::class,'venue_id');
    }
    public function start(){
        return $this->belongsTo(Time::class,'start_time');
    }
    public function end(){
        return $this->belongsTo(Time::class,'end_time');
    }

}
