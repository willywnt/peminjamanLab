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

class ComputerController extends Controller
{
    public function index(){
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
        $jumlah = 32;
        $computer = Komputer_sekret::select('sesi_1')->where('hari','Senin')->get();
        return view('admin.display_comp',compact('days','jumlah','computer'));
    }

    public function ajax(Request $request){
        $sesi = $request->input('sesi');
        $ruangan = $request->input('ruangan');
        $hari = $request->input('hari');

        if($ruangan == "lab_sekret"){
            return $comp = Komputer_sekret::select($sesi)->where('hari', $hari)->get();
        }
        if($ruangan == "lab_301"){
            return $comp = Komputer_301::select($sesi)->where('hari', $hari)->get();
        }
        if($ruangan == "lab_302"){
            return $comp = Komputer_302::select($sesi)->where('hari', $hari)->get();
        }
        if($ruangan == "lab_303"){
            return $comp = Komputer_303::select($sesi)->where('hari', $hari)->get();
        }
        if($ruangan == "lab_401"){
            return $comp = Komputer_401::select($sesi)->where('hari', $hari)->get();
        }
        if($ruangan == "lab_402"){
            return $comp = Komputer_402::select($sesi)->where('hari', $hari)->get();
        }
        if($ruangan == "lab_403"){
            return $comp = Komputer_403::select($sesi)->where('hari', $hari)->get();
        }
    }
}
