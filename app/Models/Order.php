<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="order";
    protected $fillable=[
        'user_id',
        'venue_id',
        'start_time',
        'end_time',
        'date',
        'status'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function venue(){
        return $this->belongsTo(Venue::class,'venue_id');
    }
}
