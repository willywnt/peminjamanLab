<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal_301;
use App\Models\Jadwal_302;
use App\Models\Jadwal_303;
use App\Models\Jadwal_401;
use App\Models\Jadwal_402;
use App\Models\Jadwal_403;
use App\Models\Jadwal_Kelas;

class JadwalController extends Controller
{
    
    public function sekret(){
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
        return view('jadwal.sekret',compact('jadwal_kls','days'));
    }
    public function lab301(){
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
        $jadwal301 = Jadwal_301::where('hari', $days)->get();
        return view('jadwal.301',compact('jadwal301','jadwal_kls','days'));
    }
    public function lab302(){
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
        $jadwal302 = Jadwal_302::where('hari', $days)->get();
        return view('jadwal.302',compact('jadwal302','jadwal_kls','days'));
    }
    public function lab303(){
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
        $jadwal303 = Jadwal_303::where('hari', $days)->get();
        return view('jadwal.303',compact('jadwal303','jadwal_kls','days'));
    }
    public function lab401(){
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
        $jadwal401 = Jadwal_401::where('hari', $days)->get();
        return view('jadwal.401',compact('jadwal401','jadwal_kls','days'));
    }
    public function lab402(){
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
        $jadwal402 = Jadwal_402::where('hari', $days)->get();
        return view('jadwal.402',compact('jadwal402','jadwal_kls','days'));
    }
    public function lab403(){
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
        $jadwal403 = Jadwal_403::where('hari', $days)->get();
        return view('jadwal.403',compact('jadwal403','jadwal_kls','days'));
    }

}
