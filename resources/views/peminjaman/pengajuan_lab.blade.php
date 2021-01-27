@extends('layout/main')
@section('title','Pengajuan')
<link rel ="stylesheet" type ="text/css" href ="{{asset('/css/style_peminjaman.css')}}"/>
<script src="{{asset('/js/times.js')}}"></script>

@section('container')
		<div class="banner">
			<div class="Home">
				<img src="{{asset('/img/banner-2.png')}}">
				<div class="judul">
					<h1>Pengajuan LAB</h1>
					<p><a href="{{ url('/') }}">Home</a> <strong>></strong> Peminjaman</p>
				</div>
			</div>
        </div>
        <div class="container">
            <div class="side-nav">
                @include('layout.calendar')
                <!--navigation-->
                <div class="nav">
                <a href="{{ url('/peminjaman/Sekret') }}">
                    <div class="menu-0 menu btn btn-lab lab-fik lab-sekret active-dropdown" id="btn-lab-1">
                            <p>LAB SEKRET</p>
                    </div></a>
                    <div class="btn btn-lab lab-fik lab-lt-3" id="btn-lab-3">
                        <p>LAB Lantai 3</p>
                        <i class="fas fa-chevron-right arrow-3"></i>
                    </div>
                    <div class="dropdown-content-2">
                        <div class="dropdown">
                            <div class="menu-1 menu" id="menu">
                            <a href="{{ url('/peminjaman/301') }}">
                                <p>Ruang<br>LAB<br>301</p>
                                </a>
                            </div>
                            <div class="menu-2 menu" id="menu">
                            <a href="{{ url('/peminjaman/302') }}">
                                <p>Ruang<br>LAB<br>302</p>
                                </a>
                            </div>
                            <div class="menu-3 menu" id="menu">
                            <a href="{{ url('/peminjaman/303') }}">
                                <p>Ruang<br>LAB<br>303</p>
                                </a>
                            </div> 
                        </div>  
                    </div>
                    <div class="btn btn-lab lab-fik lab-lt-4" id="btn-lab-4">
                        <p>LAB Lantai 4</p>
                        <i class="fas fa-chevron-right arrow-4"></i>
                    </div>
                    <div class="dropdown-content-3">
                        <div class="dropdown">
                            <div class="menu-4 menu" id="menu">
                            <a href="{{ url('/peminjaman/401') }}">
                                <p>Ruang<br>LAB<br>401</p>
                                </a>
                            </div>
                            <div class="menu-5 menu" id="menu">
                            <a href="{{ url('/peminjaman/402') }}">
                                <p>Ruang<br>LAB<br>402</p>
                                </a>
                            </div>
                            <div class="menu-6 menu" id="menu">
                            <a href="{{ url('/peminjaman/403') }}">
                                <p>Ruang<br>LAB<br>403</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="divide"></div>
            <div class="komputer">
                <p class="showed">Ruang {{$lab}} > Pengajuan</p>
                <div class="pengajuan">
                    <div class="container-pengajuan">
                        <div class="title">
                            <div class="icon">
                                <img src="{{asset('/img/comp-selected.png')}}">
                            </div>
                            <h1>Ajukan Peminjaman Komputer</h1>
                        </div>
                        <div>
                            <form method="post" action="{{url('/store')}}">
                            @csrf
                                <div class="form-control">
                                    <div class="form row-1">
                                        <p class="text-control-1">Ruangan</p>
                                        <input type="text" name="ruangan" id="ruangan" value="{{$lab}}" readonly="readonly">
                                    </div>
                                    <div class="form row-2">
                                        <p class="text-control-2">ID Komputer</p>
                                        <input type="text" name="id_komputer" id="id_komputer" value="{{$id}}" readonly="readonly">
                                    </div>
                                    <div class="form row-3">
                                        <p class="text-control-3">Tanggal</p>
                                        <input type="text" name="tanggal" id="tanggal" value="{{$date}}" readonly="readonly">
                                    </div>
                                    <div class="form row-4">
                                        <p class="text-control-4">Jam</p>
                                        @if($sesi == "sesi_1")
                                        <input type="text" name="waktu" id="waktu" value="08:00 - 09:40" readonly="readonly">
                                        @elseif($sesi == "sesi_2")
                                        <input type="text" name="waktu" id="waktu" value="10:00 - 11:40" readonly="readonly">
                                        @elseif($sesi == "sesi_3")
                                        <input type="text" name="waktu" id="waktu" value="13:00 - 14:40" readonly="readonly">
                                        @elseif($sesi == "sesi_4")
                                        <input type="text" name="waktu" id="waktu" value="15:00 - 16:40" readonly="readonly">
                                        @endif
                                    </div>
                                    <div class="form row-5">
                                        <p class="text-control-6">Keperluan</p>
                                        <textarea name="keperluan" id="keperluan"></textarea>
                                    </div>
                                    <input type="hidden" id="hari" name="hari" value="{{$days}}">
                                    <input type="hidden" id="sesi" name="sesi" value="{{$sesi}}">
                                    <button type="submit" class="submit">Kirim</button>
                                </div>
                            </form>
                            <div class="btn btn-pengajuan">
                                <button class="batal" onclick="history.back()">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="{{asset('/js/calender.js')}}"></script>
<script src="{{asset('/js/btn_sesi.js')}}"></script>
<script src="{{asset('/js/comp.js')}}"></script>
<script src="{{asset('/js/dropdown.js')}}"></script>
@endsection