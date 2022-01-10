<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function house(){
        return $this->belongsTo(House::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
