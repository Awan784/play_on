<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venue extends Model
{
    use HasFactory;
    protected $table='venue';
    protected $fillable=[
        'name',
        'description',
        'image',
        'price',
        'location_id',
        'category_id',
        'manager_id',
        'address',
        'lat','long'
    ];
    public function location(){
        return $this->belongsTo(Location::class,'location_id');
    }
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function manager(){
        return $this->belongsTo(Admin::class,'manager_id');
    }
    public function timetable(){
        return $this->hasMany(VenueTimeTable::class,'venue_id');
    }
    public function hasDay($day){
        return ($this->timetable()->where('day',$day)->first())?true:false;
    }
    public function time($day){
        return $this->timetable()->where('day',$day)->first();
    }
    public function days(){
        return $this->timetable()->select('day')->get();
    }
    /**
     * Get all of the coach for the Venue
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function coach(): HasMany
    {
        return $this->hasMany(Couch::class,'venue_id');
    }
}
