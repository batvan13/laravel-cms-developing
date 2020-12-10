<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelPicture extends Model
{
     // Mass assigned
    protected $fillable=['hotel_id','title'];

    public function hotel()
    {
    	return $this->belongsTo('App\Hotel');
    }

}
