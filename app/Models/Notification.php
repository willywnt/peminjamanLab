<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notification';
    protected $fillable = ['author','text','user_id'];
    
    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
}
