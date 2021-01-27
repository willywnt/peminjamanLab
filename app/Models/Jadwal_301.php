<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_301 extends Model
{
    protected $table = 'jadwal_lab_301';

    public function status(){
    	return $this->belongsTo('App\Models\Status');
    }
}
