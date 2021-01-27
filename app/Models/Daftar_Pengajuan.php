<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar_Pengajuan extends Model
{
    protected $table = 'daftar_pengajuan';
    protected $fillable = ['ruangan','id_komputer','tanggal','hari','jam','sesi','keperluan','status'];
    
    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
    public function status_id(){
    	return $this->belongsTo('App\Models\Status_Peminjaman');
    }
}
