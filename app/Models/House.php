<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
   protected $fillable=['space','price','direction','rooms_no','floor_no','available','lat','long','place_id','owner_id'];

   public function owner(){
       return $this->belongsTo(Owner::class);
   }
   public function place(){
       return $this->belongsTo(Place::class);
   }
   public function images(){
       return $this->hasMany(HouseImage::class);
   }
    public function videos(){
        return $this->hasMany(HouseVideo::class);
    }

   public function favorites(){
       return $this->hasMany(Favorite::class);
   }
}
