<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftar_Pengajuan;
use App\Models\Status_Peminjaman;
use App\Models\Komputer_Sekret;
use App\Models\Komputer_301;
use App\Models\Komputer_302;
use App\Models\Komputer_303;
use App\Models\Komputer_401;
use App\Models\Komputer_402;
use App\Models\Komputer_403;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(){
        $id = auth()->user()->id;
        $pengajuan = Daftar_pengajuan::where('user_id',$id)->get();
        $status = Status_Peminjaman::all();
        return view('status_peminjaman',compact('pengajuan','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ruangan' => 'required',
            'id_komputer' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'hari' => 'required',
            'sesi' => 'required',
            'keperluan' => 'required'
        ]);

        $data = new Daftar_Pengajuan;
        $data->ruangan = $request->ruangan;
        $data->id_komputer = $request->id_komputer;
        $data->tanggal = $request->tanggal;
        $data->hari = $request->hari;
        $data->jam = $request->waktu;
        $data->sesi = $request->sesi;
        $data->keperluan = $request->keperluan;
        $data->status_id = "1";
        $data->user_id = auth()->user()->id;
        $data->save();

        $kode_lab = explode("-",$request->id_komputer);
        $no = explode(", ",$kode_lab[1]);
        $kode=array();
        $length = count($no);
        for($i=0; $i < $length; $i++){
            $kode[$i] = $kode_lab[0] ."-". $no[$i];
        }

        if($data->save()){
            if($request->ruangan == "LAB Sekret"){
                for($i=0; $i < $length; $i++){
                    $comp = Komputer_Sekret::where('hari', $request->hari)->where('kode',$kode[$i])
                    ->update([
                        $request->sesi => "2"
                    ]);
                }
            }
            if($request->ruangan == "LAB 301"){
                for($i=0; $i < $length; $i++){
                    $comp = Komputer_301::where('hari', $request->hari)->where('kode', $kode[$i])
                    ->update([
                        $request->sesi => "2"
                    ]);
                }
            }
            if($request->ruangan == "LAB 302"){
                for($i=0; $i < $length; $i++){
                    $comp = Komputer_302::where('hari', $request->hari)->where('kode', $kode[$i])
                    ->update([
                        $request->sesi => "2"
                    ]);
                }
            }
            if($request->ruangan == "LAB 303"){
                for($i=0; $i < $length; $i++){
                    $comp = Komputer_303::where('hari', $request->hari)->where('kode', $kode[$i])
                    ->update([
                        $request->sesi => "2"
                    ]);
                }
            }
            if($request->ruangan == "LAB 401"){
                for($i=0; $i < $length; $i++){
                    $comp = Komputer_401::where('hari', $request->hari)->where('kode', $kode[$i])
                    ->update([
                        $request->sesi => "2"
                    ]);
                }
            }
            if($request->ruangan == "LAB 402"){
                for($i=0; $i < $length; $i++){
                    $comp = Komputer_402::where('hari', $request->hari)->where('kode', $kode[$i])
                    ->update([
                        $request->sesi => "2"
                    ]);
                }
            }
            if($request->ruangan == "LAB 403"){
                for($i=0; $i < $length; $i++){
                    $comp = Komputer_403::where('hari', $request->hari)->where('kode', $kode[$i])
                    ->update([
                        $request->sesi => "2"
                    ]);
                }
            }
        }
        $lab_name = explode(" ", $request->ruangan);
        $url = "peminjaman/" . $lab_name[1];
        return redirect($url)->with('success', 'Pengajuan Anda Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $pengajuan = Daftar_pengajuan::with('user')->get();
        $status = Status_Peminjaman::all();
        $menunggu = count(Daftar_pengajuan::where('status_id','1')->get());
        $diterima = count(Daftar_pengajuan::where('status_id','2')->get());
        $selesai = count(Daftar_pengajuan::where('status_id','3')->get());
        $ditolak = count(Daftar_pengajuan::where('status_id','4')->get());
        return view('admin.daftar_pengajuan',compact('pengajuan','status','menunggu','diterima', 'selesai','ditolak'));
    }

    public function update_pengajuan(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required',
            'status_peminjaman' => 'required'
        ]);
        $data = Daftar_pengajuan::where('id', $id)->get();
        $update = Daftar_pengajuan::where('id', $id)->update([
            'status_id' => $request->status_peminjaman
        ]);
        
        $kode_lab = explode("-",$request->kode);
        $no = explode(", ",$kode_lab[1]);
        $kode = array();
        $length = count($no);
        for($i=0; $i < $length; $i++){
            $kode[$i] = $kode_lab[0] ."-". $no[$i];
        }

        foreach ($data as $dt) {
            if($request->status_peminjaman == '1'){
                if($dt->ruangan == "LAB Sekret"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_Sekret::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "2"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 301"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_301::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "2"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 302"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_302::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "2"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 303"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_303::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "2"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 401"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_401::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "2"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 402"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_402::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "2"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 403"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_403::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "2"
                        ]);
                    }
                }
            }
            if($request->status_peminjaman == '2'){
                if($dt->ruangan == "LAB Sekret"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_Sekret::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "1"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 301"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_301::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "1"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 302"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_302::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "1"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 303"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_303::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "1"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 401"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_401::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "1"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 402"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_402::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "1"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 403"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_403::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "1"
                        ]);
                    }
                }
            }
            if($request->status_peminjaman == '3' || $request->status_peminjaman == '4'){
                if($dt->ruangan == "LAB Sekret"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_Sekret::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "0"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 301"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_301::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "0"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 302"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_302::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "0"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 303"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_303::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "0"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 401"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_401::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "0"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 402"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_402::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "0"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 403"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_403::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "0"
                        ]);
                    }
                }
            }
        }

        return redirect()->back()->with('success','Data berhasil diupdate');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_pengajuan($id)
    {
        $status = Status_Peminjaman::all();
        $data = Daftar_pengajuan::where('id', $id)->get();
        return view('admin.edit_status',compact('data','status'));
    }

    public function selesai_pengajuan(Request $request, $id)
    {
        $data = Daftar_pengajuan::where('id', $id)->get();
        $update = Daftar_pengajuan::where('id', $id)->update([
            'status_id' => '3'
        ]);
        
        $kode_lab = explode("-",$request->kode);
        $no = explode(", ",$kode_lab[1]);
        $kode = array();
        $length = count($no);
        for($i=0; $i < $length; $i++){
            $kode[$i] = $kode_lab[0] ."-". $no[$i];
        }

        foreach ($data as $dt) {
            if($dt->ruangan == "LAB Sekret"){
                for($i=0; $i < $length; $i++){
                    $comp = Komputer_Sekret::where('hari', $dt->hari)->where('kode',$kode[$i])
                    ->update([
                        $dt->sesi => "0"
                    ]);
                }
            }
            if($dt->ruangan == "LAB 301"){
                for($i=0; $i < $length; $i++){
                    $comp = Komputer_301::where('hari', $dt->hari)->where('kode',$kode[$i])
                    ->update([
                        $dt->sesi => "0"
                    ]);
                }
            }
            if($dt->ruangan == "LAB 302"){
                $comp = Komputer_302::where('hari', $dt->hari)->where('kode',$kode[$i])
                    ->update([
                        $dt->sesi => "0"
                    ]);
            }
            if($dt->ruangan == "LAB 303"){
                $comp = Komputer_303::where('hari', $dt->hari)->where('kode',$kode[$i])
                    ->update([
                        $dt->sesi => "0"
                    ]);
            }
            if($dt->ruangan == "LAB 401"){
                $comp = Komputer_401::where('hari', $dt->hari)->where('kode',$kode[$i])
                    ->update([
                        $dt->sesi => "0"
                    ]);
            }
            if($dt->ruangan == "LAB 402"){
                $comp = Komputer_402::where('hari', $dt->hari)->where('kode',$kode[$i])
                    ->update([
                        $dt->sesi => "0"
                    ]);
            }
            if($dt->ruangan == "LAB 403"){
                $comp = Komputer_403::where('hari', $dt->hari)->where('kode',$kode[$i])
                    ->update([
                        $dt->sesi => "0"
                    ]);
            }  
        }

        return redirect()->back()->with('success','Data berhasil diupdate');
    }

    public function save_pengajuan(Request $request, $id)
    {
        $request->validate([
            'ruangan' => 'required',
            'komputer' => 'required',
            'hari' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'status_peminjaman' => 'required'
        ]);
        
        $data = Daftar_pengajuan::where('id', $id)->get();
        $update = Daftar_pengajuan::where('id', $id)->update([
            'ruangan' => $request->ruangan,
            'id_komputer' => $request->komputer,
            'hari' => $request->hari,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'status_id' => $request->status_peminjaman
        ]);

        $kode_lab = explode("-",$request->komputer);
        $no = explode(", ",$kode_lab[1]);
        $kode = array();
        $length = count($no);
        for($i=0; $i < $length; $i++){
            $kode[$i] = $kode_lab[0] ."-". $no[$i];
        }

        foreach ($data as $dt) {
            if($request->status_peminjaman == '1'){
                if($dt->ruangan == "LAB Sekret"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_Sekret::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "2"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 301"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_301::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "2"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 302"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_302::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "2"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 303"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_303::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "2"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 401"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_401::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "2"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 402"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_402::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "2"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 403"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_403::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "2"
                        ]);
                    }
                }
            }
            if($request->status_peminjaman == '2'){
                if($dt->ruangan == "LAB Sekret"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_Sekret::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "1"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 301"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_301::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "1"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 302"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_302::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "1"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 303"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_303::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "1"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 401"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_401::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "1"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 402"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_402::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "1"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 403"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_403::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "1"
                        ]);
                    }
                }
            }
            if($request->status_peminjaman == '3' || $request->status_peminjaman == '4'){
                if($dt->ruangan == "LAB Sekret"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_Sekret::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "0"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 301"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_301::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "0"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 302"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_302::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "0"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 303"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_303::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "0"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 401"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_401::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "0"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 402"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_402::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "0"
                        ]);
                    }
                }
                if($dt->ruangan == "LAB 403"){
                    for($i=0; $i < $length; $i++){
                        $comp = Komputer_403::where('hari', $dt->hari)->where('kode',$kode[$i])
                        ->update([
                            $dt->sesi => "0"
                        ]);
                    }
                }
            }
        }

        return redirect()->back()->with('success','Data berhasil diupdate');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_pengajuan($id)
    {
        $pengajuan = Daftar_Pengajuan::find($id);
        $pengajuan->delete();
        
        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
