<?php

namespace App;

use App\HouseSearchHistoryFilter\HouseSearchHistoryFilter;
use App\Models\Appointement;
use App\Models\Favorite;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','mid_name','last_name','sex','birthday','college_speciality_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function appointments(){
        return $this->hasMany(Appointment::class);
    }

    public function favorites(){
        return $this->hasMany(Favorite::class);
    }

    public function searches_with_colleagues(){
        return $this->hasMany(HouseSearchHistoryFilter::class);
    }
}
