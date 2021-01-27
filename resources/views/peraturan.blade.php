@extends('layout/main')
@section('title','Peraturan')
<link rel ="stylesheet" type ="text/css" href ="{{asset('/css/style_peraturan.css')}}"/>
        
@section('container')
		<div class="banner">
			<div class="Home">
				<img src="{{asset('/img/banner-5.png')}}">
				<div class="judul">
					<h1>Peraturan LAB</h1>
					<p><a href="{{ url('/') }}">Home</a> <strong>></strong> Peraturan</p>
				</div>
			</div>
		</div>
        <div class="container">
            <div class="side-nav" id="navbar">
                <h1>Keterangan :</h1>
                <div class="berat">
                    <h2>Pelanggaran Berat</h2>
                    <p>
                        Bila melakukan pelanggaran ini  maka tidak dapat meminjam 14 x 24 kedepannya
                    </p>
                </div>
                
                <div class="sedang">
                    <h2>Pelanggaran Sedang</h2>
                    <p>
                        Bila melakukan pelanggaran ini 2 kali maka tidak dapat meminjam 14 x 24 kedepannya
                    </p>
                </div>
                
                <div class="ringan">
                    <h2>Pelanggaran Ringan</h2>
                    <p>
                        Bila melakukan pelanggaran ini 2 kali maka tidak dapat meminjam 14 x 24 kedepannya
                    </p>
                </div>
            </div>
            <div class="tatib-lab">
                <h1>Tata tertib peminjaman LAB</h1>
                <div class="berat">
                    <h2>Pelanggaran Berat</h2>
                    <div class="border border-merah">
                        <h1>Setiap peminjam wajib menggunakan fasilitas bersama fik lab dengan penuh tanggung jawab, semua kerusakan yang terjadi akan ditanggung peminjam</h1>
                        <h1>Dilarang membuka situs selain elearning, bila melanggar akan dikenakan peringatan, bila melakukannya lebih dari 2 kali akan dicabut izin meminjam</h1>
                    </div>
                </div>
                <div class="sedang">
                    <h2>Pelanggaran Sedang</h2>
                    <div class="border border-orange">
                        <h1>Tidak diperkenankan membawa makanan dan minuman ke dalam lab</h1>
                        <h1>Dilarang meminjamkan akun dan/atau meminjam akun fiklab learning kepada/dari orang lain, bila melanggar akan dikenakan peringatan, bila melakukannya lebih dari 2(dua) kali akan dicabut izin meminjam</h1>
                        <h1>Dilarang mengotak-atik pengaturan tiap komputer baik software maupun hardware, bila melanggar akan dikenakan peringatan, bila melakukannya lebih dari 2(dua) kali akan dicabut izin meminjam</h1>
                    </div>
                </div>
                <div class="ringan">
                    <h2>Pelanggaran Ringan</h2>
                    <div class="border border-kuning">
                        <h1>Harap menaruh tas dan/atau barang bawaan Anda di lemari penyimpanan</h1>
                        <h1>Harap menghubungi Admin bila melakukan pembatalan dalam meminjam sekurang-kurangnya 6(enam) jam sebelum jadwal peminjaman</h1>
                    </div>
                </div>
            </div>
        </div>
@endsection
