<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Hotel extends Model
{
    // Mass assigned
    protected $fillable=['user_id','category_id','slug','name_bg','name_en','town_id',
    'address_bg','address_en','phone','email','web_adr','stars','start_price','price_long','description'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function images()
    {
        return $this->hasMany('App\HotelImage', 'hotel_id', 'id');
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
