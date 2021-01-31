<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
     // Mass assigned
     protected $fillable=['hotel_id','image'];

     public function hotel()
     {
         return $this->belongsTo('App\Hotel');
     }
}
