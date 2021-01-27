<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_Kelas;
use App\Models\Daftar_Pengajuan;
use App\Models\Pesan_User;
use App\Models\User;
use App\Models\Komputer_Sekret;
use App\Models\Komputer_301;
use App\Models\Komputer_302;
use App\Models\Komputer_303;
use App\Models\Komputer_401;
use App\Models\Komputer_402;
use App\Models\Komputer_403;

class PagesController extends Controller
{
    public function index(){
        return view('dashboard');
    }
    public function admin(){
        date_default_timezone_set('Asia/Jakarta');
        $hours = date("H");
        $minute = date("i");
        $hours = (int)$hours;
        $minute = (int)$minute;
        $day = date('D');
        $dayList = array(
            'Sun' => 'Minggu',
            'Mon' => 'Senin',
            'Tue' => 'Selasa',
            'Wed' => 'Rabu',
            'Thu' => 'Kamis',
            'Fri' => 'Jumat',
            'Sat' => 'Sabtu'
        );
        $days = $dayList[$day];
        $time = $hours*60 + $minute;
        $sesi = "";
        $current = "";
        $jumlah = 0;
        if($time >= 390){
            $sesi = 'sesi_1';
            $current = '08:00 - 09:40';
        }
        if($time >= 600){
            $sesi = 'sesi_2';
            $current = '10:00 - 11:40';
        }
        if($time >= 700){
            $sesi = 'sesi_3';
            $current = '13:00 - 14:40';
        }
        if($time >= 880){
            $sesi = 'sesi_4';
            $current = '15:00 - 16:40';
        }
        if($time >= 1000 || $time <= 389){
            $sesi = 'sesi_expired';
        }
        $comp = 0;
        $comp += count(Komputer_sekret::where('hari', $days)->where($sesi, '1')->get());
        $comp += count(Komputer_301::where('hari', $days)->where($sesi, '1')->get());
        $comp += count(Komputer_302::where('hari', $days)->where($sesi, '1')->get());
        $comp += count(Komputer_303::where('hari', $days)->where($sesi, '1')->get());
        $comp += count(Komputer_401::where('hari', $days)->where($sesi, '1')->get());
        $comp += count(Komputer_402::where('hari', $days)->where($sesi, '1')->get());
        $comp += count(Komputer_403::where('hari', $days)->where($sesi, '1')->get());
        $jadwal = count(Jadwal_Kelas::where('hari', $days)->get());
        $pesan = Pesan_User::all();
        $jumlah = count($pesan);
        $users = User::all();
        $jumlah_users =count($users);
        $daftar = count(Daftar_Pengajuan::where('status_id','1')->get());
        $tbl_jadwal = Jadwal_Kelas::where('hari', $days)->get();
        return view('admin.dashboard',compact('pesan','users','jumlah','daftar','comp','jadwal','current','tbl_jadwal','jumlah_users'));
    }
    public function peraturan(){
        return view('peraturan');
    }
}
