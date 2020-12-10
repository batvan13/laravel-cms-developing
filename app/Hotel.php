<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Hotel extends Model
{
    // Mass assigned
    protected $fillable=['user_id','title'];


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function pictures()
    {
        return $this->hasMany('App\HotelPicture', 'hotel_id', 'id');
    }

    public function extra()
    {
        return $this->hasOne('App\HotelExtra', 'hotel_id', 'id');
    }

    public function category()
    {
    	return $this->belongsTo('App\HotelCategory');
    }


}
