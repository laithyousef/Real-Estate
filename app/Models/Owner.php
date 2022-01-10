<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    //
    protected $fillable=['first_name','last_name','phone_no','address'];

    public function houses(){
        return $this->hasMany(House::class);
}
    public  function appointments(){
          return $this->hasMany(Appointment::class);
    }
}
