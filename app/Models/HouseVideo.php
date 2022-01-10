<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HouseVideo extends Model
{
    protected $fillable = ['video_url','house_id'];

    public function house(){
        return $this->belongsTo(House::class);
    }
}
