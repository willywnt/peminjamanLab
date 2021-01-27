@extends('layout/main')
@section('title','Status Peminjaman')
<link rel ="stylesheet" type ="text/css" href ="{{asset('/css/style_status.css')}}"/>

@section('container')
		<div class="banner">
			<div class="Home">
				<img src="{{asset('/img/banner-4.png')}}">
				<div class="judul">
					<h1>Status Peminjaman</h1>
					<p><a href="{{ url('/') }}">Home</a> <strong>></strong> Status</p>
				</div>
			</div>
        </div>
        <div class="container">
            <div class="status">
                <img src="{{asset('/img/icon-times.png')}}">
                <h1>STATUS PEMINJAMAN</h1>
            </div>
            <div class="status-table">
                <table style="width:100%">
                    <tr class="bg-gray">
                        <th>NO</th>
                        <th>RUANGAN</th> 
                        <th>ID KOMPUTER</th>
                        <th>TANGGAL</th>
                        <th>WAKTU</th>
                        <th>KEPERLUAN</th>
                        <th>STATUS</th>
                        <th>DIBUAT</th>
                        <th>DiPERBAHARUI</th>
                    </tr>
                    @foreach($pengajuan as $item)
                    <tr>
                        <th>{{$loop->iteration}}</th>
                        <th>{{$item->ruangan}}</th> 
                        <th>{{$item->id_komputer}}</th>
                        <th>{{$item->tanggal}}</th>
                        <th>{{$item->jam}}</th>
                        <th>{{$item->keperluan}}</th>
                        @foreach($status as $stat)
                        @if($stat->id == $item->status_id)
                        <th class="{{$stat->status}}">{{$stat->status}}</th>
                        @endif
                        @endforeach
                        <th>{{$item->created_at->diffForHumans()}}</th>
                        <th>{{$item->updated_at->diffForHumans()}}</th>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
@endsection