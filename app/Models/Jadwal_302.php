<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_302 extends Model
{
    protected $table = 'jadwal_lab_302';

    public function status(){
    	return $this->belongsTo('App\Models\Status');
    }
}
