<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal_303 extends Model
{
    protected $table = 'jadwal_lab_303';

    public function status(){
    	return $this->belongsTo('App\Models\Status');
    }
}
