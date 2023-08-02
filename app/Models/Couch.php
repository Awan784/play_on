<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Couch extends Model
{
    use HasFactory;
    protected $table='couch';
    protected $fillable=[
        'created_by',
        'name',
        'venue_id'
    ];
    public function created_by(){
        return $this->belongsTo(Admin::class,'created_by');
    }
    /**
     * Get the venue that owns the Couch
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function venue(): BelongsTo
    {
        return $this->belongsTo(Venue::class, 'venue_id');
    }
}
