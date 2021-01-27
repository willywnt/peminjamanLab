<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komputer_Sekret;
use App\Models\Komputer_301;
use App\Models\Komputer_302;
use App\Models\Komputer_303;
use App\Models\Komputer_401;
use App\Models\Komputer_402;
use App\Models\Komputer_403;
use App\Models\Jadwal_Kelas;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    public function peminjaman_dosen(){
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
        $jadwal_kls = Jadwal_Kelas::all();
        return view('peminjaman.peminjaman_dosen',compact('jadwal_kls','days'));
    }
    
    public function peminjaman_sekret(Request $request){     
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
        $jumlah = 0;
        if($time >= 390){
            $sesi = 'sesi_1';
        }
        if($time >= 600){
            $sesi = 'sesi_2';
        }
        if($time >= 700){
            $sesi = 'sesi_3';
        }
        if($time >= 880){
            $sesi = 'sesi_4';
        }
        if($time >= 1000 || $time <= 389){
            $sesi = 'sesi_expired';
        }
        if($days == "Sabtu" || $days == "Minggu"){
            $sesi = 'sesi_expired';
            $jumlah = 32;
        }
        $jadwal_kls = Jadwal_Kelas::all();
        $computer = Komputer_sekret::select($sesi)->where('hari', $days)->get();
        
        return view('peminjaman.peminjaman_sekret',compact('jadwal_kls','days','computer','time','sesi','jumlah'));
    }
    
    public function ajax_sekret(Request $request){
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
        $sesi = $request->input('sesi');
        return $sesi = Komputer_sekret::select($sesi)->where('hari', $days)->get();
    }

    public function peminjaman_301(Request $request){     
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
        $jumlah = 0;
        if($time >= 390){
            $sesi = 'sesi_1';
        }
        if($time >= 600){
            $sesi = 'sesi_2';
        }
        if($time >= 700){
            $sesi = 'sesi_3';
        }
        if($time >= 880){
            $sesi = 'sesi_4';
        }
        if($time >= 1000 || $time <= 389){
            $sesi = 'sesi_expired';
        }
        if($days == "Sabtu" || $days == "Minggu"){
            $sesi = 'sesi_expired';
            $jumlah = 40;
        }
        $jadwal_kls = Jadwal_Kelas::all();
        $computer = Komputer_301::select($sesi)->where('hari', $days)->get();
        
        return view('peminjaman.peminjaman_301',compact('jadwal_kls','days','computer','time','sesi','jumlah'));
    }

    public function ajax_301(Request $request){
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
        $sesi = $request->input('sesi');
        return $sesi = Komputer_301::select($sesi)->where('hari', $days)->get();
    }

    public function peminjaman_302(Request $request){     
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
        $jumlah = 0;
        if($time >= 390){
            $sesi = 'sesi_1';
        }
        if($time >= 600){
            $sesi = 'sesi_2';
        }
        if($time >= 700){
            $sesi = 'sesi_3';
        }
        if($time >= 880){
            $sesi = 'sesi_4';
        }
        if($time >= 1000 || $time <= 389){
            $sesi = 'sesi_expired';
        }
        if($days == "Sabtu" || $days == "Minggu"){
            $sesi = 'sesi_expired';
            $jumlah = 40;
        }
        $jadwal_kls = Jadwal_Kelas::all();
        $computer = Komputer_302::select($sesi)->where('hari', $days)->get();
        
        return view('peminjaman.peminjaman_302',compact('jadwal_kls','days','computer','time','sesi','jumlah'));
    }

    public function ajax_302(Request $request){
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
        $sesi = $request->input('sesi');
        return $sesi = Komputer_302::select($sesi)->where('hari', $days)->get();
    }

    public function peminjaman_303(Request $request){     
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
        $jumlah = 0;
        if($time >= 390){
            $sesi = 'sesi_1';
        }
        if($time >= 600){
            $sesi = 'sesi_2';
        }
        if($time >= 700){
            $sesi = 'sesi_3';
        }
        if($time >= 880){
            $sesi = 'sesi_4';
        }
        if($time >= 1000 || $time <= 389){
            $sesi = 'sesi_expired';
        }
        if($days == "Sabtu" || $days == "Minggu"){
            $sesi = 'sesi_expired';
            $jumlah = 40;
        }
        $jadwal_kls = Jadwal_Kelas::all();
        $computer = Komputer_303::select($sesi)->where('hari', $days)->get();
        
        return view('peminjaman.peminjaman_303',compact('jadwal_kls','days','computer','time','sesi','jumlah'));
    }

    public function ajax_303(Request $request){
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
        $sesi = $request->input('sesi');
        return $sesi = Komputer_303::select($sesi)->where('hari', $days)->get();
    }

    public function peminjaman_401(Request $request){     
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
        $jumlah = 0;
        if($time >= 390){
            $sesi = 'sesi_1';
        }
        if($time >= 600){
            $sesi = 'sesi_2';
        }
        if($time >= 700){
            $sesi = 'sesi_3';
        }
        if($time >= 880){
            $sesi = 'sesi_4';
        }
        if($time >= 1000 || $time <= 389){
            $sesi = 'sesi_expired';
        }
        if($days == "Sabtu" || $days == "Minggu"){
            $sesi = 'sesi_expired';
            $jumlah = 40;
        }
        $jadwal_kls = Jadwal_Kelas::all();
        $computer = Komputer_401::select($sesi)->where('hari', $days)->get();
        
        return view('peminjaman.peminjaman_401',compact('jadwal_kls','days','computer','time','sesi','jumlah'));
    }

    public function ajax_401(Request $request){
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
        $sesi = $request->input('sesi');
        return $sesi = Komputer_401::select($sesi)->where('hari', $days)->get();
    }

    public function peminjaman_402(Request $request){     
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
        $jumlah = 0;
        if($time >= 390){
            $sesi = 'sesi_1';
        }
        if($time >= 600){
            $sesi = 'sesi_2';
        }
        if($time >= 700){
            $sesi = 'sesi_3';
        }
        if($time >= 880){
            $sesi = 'sesi_4';
        }
        if($time >= 1000 || $time <= 389){
            $sesi = 'sesi_expired';
        }
        if($days == "Sabtu" || $days == "Minggu"){
            $sesi = 'sesi_expired';
            $jumlah = 40;
        }
        $jadwal_kls = Jadwal_Kelas::all();
        $computer = Komputer_402::select($sesi)->where('hari', $days)->get();
        
        return view('peminjaman.peminjaman_402',compact('jadwal_kls','days','computer','time','sesi','jumlah'));
    }

    public function ajax_402(Request $request){
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
        $sesi = $request->input('sesi');
        return $sesi = Komputer_402::select($sesi)->where('hari', $days)->get();
    }

    public function peminjaman_403(Request $request){     
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
        $jumlah = 0;
        if($time >= 390){
            $sesi = 'sesi_1';
        }
        if($time >= 600){
            $sesi = 'sesi_2';
        }
        if($time >= 700){
            $sesi = 'sesi_3';
        }
        if($time >= 880){
            $sesi = 'sesi_4';
        }
        if($time >= 1000 || $time <= 389){
            $sesi = 'sesi_expired';
        }
        if($days == "Sabtu" || $days == "Minggu"){
            $sesi = 'sesi_expired';
            $jumlah = 40;
        }
        $jadwal_kls = Jadwal_Kelas::all();
        $computer = Komputer_403::select($sesi)->where('hari', $days)->get();
        
        return view('peminjaman.peminjaman_403',compact('jadwal_kls','days','computer','time','sesi','jumlah'));
    }

    public function ajax_403(Request $request){
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
        $sesi = $request->input('sesi');
        return $sesi = Komputer_403::select($sesi)->where('hari', $days)->get();
    }

    public function pengajuan(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $day = date('D');
        $date = date('j F Y');
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
        $jadwal_kls = Jadwal_Kelas::all();
        $lab = $request->name_lab;
        $id = $request->code_lab;
        $sesi = $request->sesi;
        return view('peminjaman.pengajuan_lab',compact('jadwal_kls','days','lab','id','sesi','date'));
    }
}
