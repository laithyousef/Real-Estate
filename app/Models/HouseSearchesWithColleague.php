<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class HouseSearchesWithColleague extends Model
{
   protected $fillable = [
       'lowest_price','highest_price','place_id','rooms_number',
       'colleagues_number','lowest_age','highest_age','sex',
       'are_students','college_speciality_id','user_id'
   ];

   public function user(){
       return $this->belongsTo(User::class);
   }

}
