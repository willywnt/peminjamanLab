<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Jadwal_301;
use App\Models\Jadwal_302;
use App\Models\Jadwal_303;
use App\Models\Jadwal_401;
use App\Models\Jadwal_402;
use App\Models\Jadwal_403;
use App\Models\Jadwal_Kelas;
use App\Models\Status;

class AdminJadwalController extends Controller
{
    public function jadwal_301(){
        $day = date('D');
        $dayList = array(
            'Sun' => '7',
            'Mon' => '1',
            'Tue' => '2',
            'Wed' => '3',
            'Thu' => '4',
            'Fri' => '5',
            'Sat' => '6'
        );
        $days = $dayList[$day];
        switch ($days) {
            case "1":
                $today = "Senin";
                break;
            case "2":
                $today = "Selasa";
                break;
            case "3":
                $today = "Rabu";
                break;
            case "4":
                $today = "Kamis";
                break;
            case "5":
                $today = "Jumat";
                break;
            case "6":
                $today = "Sabtu";
                break;
            case "7":
                $today = "Minggu";
                break;
            default:
                $today = "";
        }
        $edit = Jadwal_301::with('status')->where('hari',$today)->get();
        $jadwal = Jadwal_301::paginate(4);
        $status = Status::all();
        return view('admin.jadwal.jadwal_lab_301',compact('jadwal','days','edit','status'));
    }

    public function jadwal_302(){
        $day = date('D');
        $dayList = array(
            'Sun' => '7',
            'Mon' => '1',
            'Tue' => '2',
            'Wed' => '3',
            'Thu' => '4',
            'Fri' => '5',
            'Sat' => '6'
        );
        $days = $dayList[$day];
        switch ($days) {
            case "1":
                $today = "Senin";
                break;
            case "2":
                $today = "Selasa";
                break;
            case "3":
                $today = "Rabu";
                break;
            case "4":
                $today = "Kamis";
                break;
            case "5":
                $today = "Jumat";
                break;
            case "6":
                $today = "Sabtu";
                break;
            case "7":
                $today = "Minggu";
                break;
            default:
                $today = "";
        }
        $edit = Jadwal_302::with('status')->where('hari',$today)->get();
        $jadwal = Jadwal_302::paginate(4);
        $status = Status::all();
        return view('admin.jadwal.jadwal_lab_302',compact('jadwal','days','edit','status'));
    }

    public function jadwal_303(){
        $day = date('D');
        $dayList = array(
            'Sun' => '7',
            'Mon' => '1',
            'Tue' => '2',
            'Wed' => '3',
            'Thu' => '4',
            'Fri' => '5',
            'Sat' => '6'
        );
        $days = $dayList[$day];
        switch ($days) {
            case "1":
                $today = "Senin";
                break;
            case "2":
                $today = "Selasa";
                break;
            case "3":
                $today = "Rabu";
                break;
            case "4":
                $today = "Kamis";
                break;
            case "5":
                $today = "Jumat";
                break;
            case "6":
                $today = "Sabtu";
                break;
            case "7":
                $today = "Minggu";
                break;
            default:
                $today = "";
        }
        $edit = Jadwal_303::with('status')->where('hari',$today)->get();
        $jadwal = Jadwal_303::paginate(4);
        $status = Status::all();
        return view('admin.jadwal.jadwal_lab_303',compact('jadwal','days','edit','status'));
    }

    public function jadwal_401(){
        $day = date('D');
        $dayList = array(
            'Sun' => '7',
            'Mon' => '1',
            'Tue' => '2',
            'Wed' => '3',
            'Thu' => '4',
            'Fri' => '5',
            'Sat' => '6'
        );
        $days = $dayList[$day];
        switch ($days) {
            case "1":
                $today = "Senin";
                break;
            case "2":
                $today = "Selasa";
                break;
            case "3":
                $today = "Rabu";
                break;
            case "4":
                $today = "Kamis";
                break;
            case "5":
                $today = "Jumat";
                break;
            case "6":
                $today = "Sabtu";
                break;
            case "7":
                $today = "Minggu";
                break;
            default:
                $today = "";
        }
        $edit = Jadwal_401::with('status')->where('hari',$today)->get();
        $jadwal = Jadwal_401::paginate(4);
        $status = Status::all();
        return view('admin.jadwal.jadwal_lab_401',compact('jadwal','days','edit','status'));
    }

    public function jadwal_402(){
        $day = date('D');
        $dayList = array(
            'Sun' => '7',
            'Mon' => '1',
            'Tue' => '2',
            'Wed' => '3',
            'Thu' => '4',
            'Fri' => '5',
            'Sat' => '6'
        );
        $days = $dayList[$day];
        switch ($days) {
            case "1":
                $today = "Senin";
                break;
            case "2":
                $today = "Selasa";
                break;
            case "3":
                $today = "Rabu";
                break;
            case "4":
                $today = "Kamis";
                break;
            case "5":
                $today = "Jumat";
                break;
            case "6":
                $today = "Sabtu";
                break;
            case "7":
                $today = "Minggu";
                break;
            default:
                $today = "";
        }
        $edit = Jadwal_402::with('status')->where('hari',$today)->get();
        $jadwal = Jadwal_402::paginate(4);
        $status = Status::all();
        return view('admin.jadwal.jadwal_lab_402',compact('jadwal','days','edit','status'));
    }

    public function jadwal_403(){
        $day = date('D');
        $dayList = array(
            'Sun' => '7',
            'Mon' => '1',
            'Tue' => '2',
            'Wed' => '3',
            'Thu' => '4',
            'Fri' => '5',
            'Sat' => '6'
        );
        $days = $dayList[$day];
        switch ($days) {
            case "1":
                $today = "Senin";
                break;
            case "2":
                $today = "Selasa";
                break;
            case "3":
                $today = "Rabu";
                break;
            case "4":
                $today = "Kamis";
                break;
            case "5":
                $today = "Jumat";
                break;
            case "6":
                $today = "Sabtu";
                break;
            case "7":
                $today = "Minggu";
                break;
            default:
                $today = "";
        }
        $edit = Jadwal_403::with('status')->where('hari',$today)->get();
        $jadwal = Jadwal_403::paginate(4);
        $status = Status::all();
        return view('admin.jadwal.jadwal_lab_403',compact('jadwal','days','edit','status'));
    }

    public function update_status(Request $request)
    {
        $request->validate([
            'id_jadwal' => 'required',
            'lab' => 'required',
            'status' => 'required'
        ]);
        if($request->lab == "LAB 301"){
            $update = Jadwal_301::where('id', $request->id_jadwal)->update([
                'status_id' => $request->status
            ]);
        }
        if($request->lab == "LAB 302"){
            $update = Jadwal_302::where('id', $request->id_jadwal)->update([
                'status_id' => $request->status
            ]);
        }
        if($request->lab == "LAB 303"){
            $update = Jadwal_303::where('id', $request->id_jadwal)->update([
                'status_id' => $request->status
            ]);
        }
        if($request->lab == "LAB 401"){
            $update = Jadwal_401::where('id', $request->id_jadwal)->update([
                'status_id' => $request->status
            ]);
        }
        if($request->lab == "LAB 402"){
            $update = Jadwal_402::where('id', $request->id_jadwal)->update([
                'status_id' => $request->status
            ]);
        }
        if($request->lab == "LAB 403"){
            $update = Jadwal_403::where('id', $request->id_jadwal)->update([
                'status_id' => $request->status
            ]);
        }
        return redirect()->back()->with('success','Data berhasil diupdate');
    }

    public function edit_jadwal(Request $request, $id)
    {
        if($request->lab == "LAB 301"){
            $edit = Jadwal_301::where('id', $id)->get();
        }
        if($request->lab == "LAB 302"){
            $edit = Jadwal_302::where('id', $id)->get();
        }
        if($request->lab == "LAB 303"){
            $edit = Jadwal_303::where('id', $id)->get();
        }
        if($request->lab == "LAB 401"){
            $edit = Jadwal_401::where('id', $id)->get();
        }
        if($request->lab == "LAB 402"){
            $edit = Jadwal_402::where('id', $id)->get();
        }
        if($request->lab == "LAB 403"){
            $edit = Jadwal_403::where('id', $id)->get();
        }
        $ruangan = $request->lab;
        return view ('admin.jadwal.edit_jadwal',compact('edit','ruangan'));
    }
    public function update_jadwal(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required',
            'waktu' => 'required',
            'matkul' => 'required',
            'dosen' => 'required',
            'ruangan' => 'required'
        ]);
        
        if($request->ruangan == "LAB 301"){
            $update = Jadwal_301::where('id', $id)->update([
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'matkul' => $request->matkul,
                'dosen' => $request->dosen
            ]);
        }
        if($request->ruangan == "LAB 302"){
            $update = Jadwal_302::where('id', $id)->update([
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'matkul' => $request->matkul,
                'dosen' => $request->dosen
            ]);
        }
        if($request->ruangan == "LAB 303"){
            $update = Jadwal_303::where('id', $id)->update([
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'matkul' => $request->matkul,
                'dosen' => $request->dosen
            ]);
        }
        if($request->ruangan == "LAB 401"){
            $update = Jadwal_401::where('id', $id)->update([
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'matkul' => $request->matkul,
                'dosen' => $request->dosen
            ]);
        }
        if($request->ruangan == "LAB 402"){
            $update = Jadwal_402::where('id', $id)->update([
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'matkul' => $request->matkul,
                'dosen' => $request->dosen
            ]);
        }
        if($request->ruangan == "LAB 403"){
            $update = Jadwal_403::where('id', $id)->update([
                'hari' => $request->hari,
                'waktu' => $request->waktu,
                'matkul' => $request->matkul,
                'dosen' => $request->dosen
            ]);
        }
        return redirect()->back()->with('success','Data Berhasil Diperbaharui');
    }

    public function delete_jadwal(Request $request, $id)
    {
        if($request->lab == "LAB 301"){
            $jadwal = Jadwal_301::find($id);
            $jadwal->delete();
        }
        if($request->lab == "LAB 302"){
            $jadwal = Jadwal_302::find($id);
            $jadwal->delete();
        }
        if($request->lab == "LAB 303"){
            $jadwal = Jadwal_303::find($id);
            $jadwal->delete();
        }
        if($request->lab == "LAB 401"){
            $jadwal = Jadwal_401::find($id);
            $jadwal->delete();
        }
        if($request->lab == "LAB 402"){
            $jadwal = Jadwal_402::find($id);
            $jadwal->delete();
        }
        if($request->lab == "LAB 403"){
            $jadwal = Jadwal_403::find($id);
            $jadwal->delete();
        }
        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }

    public function jadwal_kelas(){
        $jadwal = Jadwal_Kelas::orderBy('hari', 'desc')->where('hari', '!=', 'Minggu')->Where('hari', '!=', 'Sabtu')->paginate(10);
        return view('admin.jadwal.jadwal_kelas',compact('jadwal'));
    }

    public function edit_kelas($id){
        $edit = Jadwal_Kelas::where('id',$id)->get();
        return view('admin.jadwal.edit_kelas',compact('edit'));
    }

    public function update_kelas(Request $request, $id)
    {
        $request->validate([
            'hari' => 'required',
            'waktu' => 'required',
            'matkul' => 'required',
            'ruangan' => 'required'
        ]);

        $update = Jadwal_Kelas::where('id', $id)->update([
            'hari' => $request->hari,
            'waktu' => $request->waktu,
            'matkul' => $request->matkul,
            'ruang' => $request->ruangan
        ]);
        return redirect()->back()->with('success','Data Berhasil Diperbaharui');
    }
    public function delete_kelas($id)
    {
        $jadwal = Jadwal_Kelas::find($id);
        $jadwal->delete();

        return redirect()->back()->with('deleted','Data Berhasil Dihapus');
    }

}
