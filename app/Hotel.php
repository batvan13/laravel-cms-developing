<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Hotel extends Model
{
    // Mass assigned
    protected $fillable=['user_id','category_id','slug','name','city','address','phone','email','web_adr'];

     // Mutators
     public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug( mb_substr($this->name, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
      }

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
