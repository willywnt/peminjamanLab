<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_403 extends Model
{
    protected $table = 'jadwal_lab_403';

    public function status(){
    	return $this->belongsTo('App\Models\Status');
    }
}
