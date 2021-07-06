<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function daftar(){
    	return $this->hasOne('App\Models\Daftar_Pengajuan');
    }
    public function profile(){
    	return $this->hasOne('App\Models\Profile');
    }
    public function message(){
    	return $this->hasMany('App\Models\Pesan_User');
    }
    public function notification(){
    	return $this->hasMany('App\Models\Notification');
    }
    public function isOnline(){
        return Cache::has('user-is-online-' . $this->id);
    }
}
