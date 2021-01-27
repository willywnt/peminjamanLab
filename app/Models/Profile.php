<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'nomor_hp',
        'email'
    ];

    public function users(){
    	return $this->belongsTo('App\Models\User');
    }
}
