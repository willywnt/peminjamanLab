@extends('layout/main')
@section('title','Jadwal 301')
<link rel ="stylesheet" type ="text/css" href ="{{asset('/css/style_jadwal.css')}}"/>
<script src="{{asset('/js/dropdown.js')}}"></script>
<script src="{{asset('/js/times.js')}}"></script>
        
@section('container')
		<div class="banner">
			<div class="Home">
				<img src="{{asset('/img/banner-3.png')}}">
				<div class="judul">
					<h1>Jadwal LAB</h1>
					<p><a href="{{ url('/') }}">Home</a> <strong>></strong> Jadwal</p>
				</div>
			</div>
		</div>
        <div class="container">
            <div class="side-nav">
                @include('layout.calendar')
                <!--navigation-->
                <div class="nav">
                    <a href="{{ url('/jadwal/sekret') }}">
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
                            <a href="{{ url('/jadwal/301') }}">
                                <p>Ruang<br>LAB<br>301</p>
                                </a>
                            </div>
                            <div class="menu-2 menu" id="menu">
                            <a href="{{ url('/jadwal/302') }}">
                                <p>Ruang<br>LAB<br>302</p>
                                </a>
                            </div>
                            <div class="menu-3 menu" id="menu">
                            <a href="{{ url('/jadwal/303') }}">
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
                            <a href="{{ url('/jadwal/401') }}">
                                <p>Ruang<br>LAB<br>401</p>
                                </a>
                            </div>
                            <div class="menu-5 menu" id="menu">
                            <a href="{{ url('/jadwal/402') }}">
                                <p>Ruang<br>LAB<br>402</p>
                                </a>
                            </div>
                            <div class="menu-6 menu" id="menu">
                            <a href="{{ url('/jadwal/403') }}">
                                <p>Ruang<br>LAB<br>403</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <img class="bg-2" src="background-element-1.png"> -->
            </div>
            <div class="divide"></div>
            <div class="panel-info">
                <p class="showed">Ruang LAB 301</p>
                <div class="jadwal-display">
                    <div class="jadwal">
                        @foreach ($jadwal301 as $jadwal)
                        <div class="info-jadwal">
                        <img src="{{asset(''.$jadwal->icon)}}"> 
                            <div class="info">
                            <h1>{{ $jadwal->matkul }}</h1>
                                <p>{{ $jadwal->waktu }}</p>
                                <p>{{ $jadwal->dosen }}</p>
                            </div>
                            <div class="status">
                                <div class="text">
                                    <h1 class="{{ $jadwal->status->status }}">{{ $jadwal->status->status }}</h1>
                                    @isset($jadwal->updated_at)
                                    <p>{{$jadwal->updated_at->diffForHumans()}}</p>
                                    @endisset
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>  
                </div>
            </div>
        </div>
    <script src="{{asset('/js/calender.js')}}"></script>
    <script src="{{asset('/js/current.js')}}"></script>
@endsection