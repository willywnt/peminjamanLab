<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan_User extends Model
{
    protected $table = 'pesan_user';
    protected $fillable = ['pesan','user_id'];

    public function users(){
    	return $this->belongsTo('App\Models\User');
    }
}
