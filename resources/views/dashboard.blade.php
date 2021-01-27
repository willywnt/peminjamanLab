@extends('layout/main')
@section('title','Dashboard')
<link rel ="stylesheet" type ="text/css" href ="{{asset('/css/style_mhs.css')}}"/>

@section('container')
		<div class="banner">
			<div class="Home">
				<img src="{{asset('/img/banner.png')}}">
				<div class="judul">
					<h1>PEMINJAMAN LAB KOMPUTER</h1>
					<p>Home</p>
				</div>
			</div>
		</div>
		<div class="container-menu">
			<div class="menu-konten">
				<div class="row-1">					
					<a href="{{ url('/peminjaman/Sekret') }}"><div class="peminjaman bob-on-hover">
					<!-- @if(auth()->user()->level == "dosen")
					<a href="{{ url('/peminjaman') }}"><div class="peminjaman bob-on-hover">
					@endif -->
						<div class="background">
							<img src="{{asset('/img/background-peminjaman.png')}}">
						</div>
						<div class="icon-1">
							<img src="{{asset('/img/icon-peminjaman.png')}}">
						</div>
						<div class="text-1">
							<div class="text-black">
								<h1>Peminjaman</h1>
								<p>Anda bisa meminjam komputer</p>
							</div>
						</div>
					</div></a>
					<a href="{{ url('/jadwal/sekret') }}"><div class="jadwal bob-on-hover">
						<div class="background">
							<img src="{{asset('/img/background-jadwal.png')}}">
						</div>
						<div class="icon-2">
							<img src="{{asset('/img/icon-jadwal.png')}}">
						</div>
						<div class="text-2">
							<div class="text-white">
								<h1>Jadwal</h1>
								<p>Semua jadwal ruangan LAB</p>
							</div>
						</div>
					</div></a>
				</div>
				<div class="row-2">
					<a href="{{ url('/peraturan') }}"><div class="aturan bob-on-hover">
						<div class="background">
							<img src="{{asset('/img/background-aturan.png')}}">
						</div>
						<div class="icon-3">
							<img src="{{asset('/img/icon-aturan.png')}}">
						</div>
						<div class="text-3">
							<div class="text-white">
								<h1>Aturan</h1>
								<p>Aturan yang harus anda patuhi</p>
							</div>
						</div>
					</div></a>
					<a href="{{ url('/status') }}"><div class="status bob-on-hover">
						<div class="background">
							<img src="{{asset('/img/background-status.png')}}">
						</div>
						<div class="icon-4">
							<img src="{{asset('/img/icon-status.png')}}">
						</div>
						<div class="text-4">
							<div class="text-black">
								<h1>Status Peminjaman</h1>
								<p>Lihat status peminjaman anda</p>
							</div>
						</div>
					</div></a>
				</div>
			</div>
		</div>
		<div class="kotak-saran">
			<form name="saran" method="post" action="{{url('/pesan')}}" class="isi-saran">
			@csrf
				<div class="col-1">
					<p>Nama</p>
					<input type="text" id="name" name="name" required>
					@error('name')
					<span class="invalid-feedback" role="alert">
						<p class="error-1">{{$message}}</p>
					</span>
					@enderror
					<br>
					<p>Email</p>
					<input type="email" id="email" name="email" required>
					@error('email')
					<span class="invalid-feedback" role="alert">
						<p class="error-1">{{$message}}</p>
					</span>
					@enderror
					<br><br>
				</div>
				<div class="col-2">
					<p>Pesan</p>
					<textarea name="message" rows="10" cols="20" required></textarea>
					@error('message')
					<span class="invalid-feedback" role="alert">
						<p class="error-1">{{$message}}</p>
					</span>
					@enderror
					<div class="form-control">
						<button type="submit" class="btn btn-submit">Kirim Pesan</button>
						<button type="reset" class="btn btn-reset">Bersihkan</button>
					</div>	
				</div>
			</form>
		</div>
		<div class="container-contact">
			<div class="col-1-33">
				<img src="{{asset('/img/phone.png')}}">
				<h1>Phone</h1>
				<p>Internal CP +62 123 456 222</p>
			</div>
			<div class="col-2-33">
				<img src="{{asset('/img/address.png')}}">
				<h1>Address</h1>
				<p>Gedung Kihajar Dewantara UPN “Veteran” Jakarta<br>
					Jl. RS. Fatmawati Raya, Pd. Labu, Kec. Cilandak,<br>
					Kota Depok, Jawa Barat 12450</p>
			</div>
			<div class="col-3-33">
				<img src="{{asset('/img/email.png')}}">
				<h1>Email</h1>
				<p>peminjamanlab@upnvj.ac.id</p>
			</div>
		</div>

		@if(session('success'))
        <div class="sign-berhasil">
            <div class="warning">
                <div class="close">
                    <i class="fas fa-times"></i>
                </div>
                <div class="icon-warning">
                    <img src="{{asset('/img/icon-berhasil.png')}}">
                </div>
                <div class="title-warning">
                    <h1>{{ session('success') }}</h1>
                </div>
            </div>
        </div>
        @endif
<script>
$('.sign-berhasil .close').click(function(){
	$('.sign-berhasil').hide();
});
</script>
@endsection