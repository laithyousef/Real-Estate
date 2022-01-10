<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable =['time','date','location','owner_id','user_id'] ;

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function owner(){
        return $this->belongsTo(Owner::class);
    }

}
