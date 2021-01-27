@extends('layout/main')
@section('title','Profil')
<link rel ="stylesheet" type ="text/css" href ="{{asset('/css/style_profil.css')}}"/>

@section('container')	
		<div class="banner">
			<div class="Home">
				<img src="{{asset('/img/banner.png')}}">
				<div class="judul">
					@if(auth()->user()->level == "mahasiswa")
					<h1>PROFIL MAHASISWA</h1>
					@elseif(auth()->user()->level == "dosen")
					<h1>PROFIL DOSEN</h1>
					@endif
					<p>Profil</p>
				</div>
			</div>
		</div>
		<form action="{{url('/update-profil')}}" method="post" enctype="multipart/form-data">
		<div class="container-main">
			<div class="display-foto">
			@csrf
				<div class="foto">
				@if(!auth()->user()->avatar)
					<img src="{{asset('/img/default-foto.png')}}" alt="avatar" id="upload-img">
				@endif
				@if(auth()->user()->avatar)
					<img src="{{asset('/storage/images/'.auth()->user()->avatar)}}" alt="avatar" id="upload-img">
				@endif
					<label for="file-input">
					<div class="icon-foto">
						<img type="file" src="{{asset('/img/icon-foto.png')}}" style="cursor: pointer">
					</div>
					</label>
					<input type="file" id="file-input" name="image" accept="image/*" style="display: none"/>
					<h1 class="file-name"></h1>
					@error('image')
					<span class="invalid-feedback" role="alert">
						<h1 class="error">{{$message}}</h1>
					</span>
					@enderror
				</div>
            </div>
            <div class="display-identitas">
				<div class="form">
					@foreach($user as $user)
					<p>NAMA</p>
					<input type="text" name="nama" id="nama" value="{{$user->name}}" required readonly="readonly">
					@if(auth()->user()->level == "mahasiswa")
					<p>NRP</p>
					@elseif(auth()->user()->level == "dosen")
					<p>NIP</p>
					@endif
					<input type="text" name="username" id="username" value="{{$user->username}}" required readonly="readonly">
					<p>JENIS KELAMIN</p>
					<input type="text" name="gender" id="gender" value="{{$user->profile->gender}}" required readonly="readonly">
					<p>NO HP</p>
					<input type="text" pattern="\d+" name="nomor_hp" id="nomor_hp" value="{{$user->profile->nomor_hp}}" required>
					@error('nomor_hp')
					<span class="invalid-feedback" role="alert">
						<h1 class="error-1">{{$message}}</h1>
					</span>
					@enderror
					<p>EMAIL</p>
					<input type="email" name="email" id="email" value="{{$user->email}}" required>
					@error('email')
					<span class="invalid-feedback" role="alert">
						<h1 class="error-1">{{$message}}</h1>
					</span>
					@enderror
					<p>NO KTP</p>
					<input type="text" name="no_ktp" id="no_ktp" value="{{$user->profile->nomor_ktp}}" readonly="readonly" required>
					<p>TEMPAT/TANGGAL LAHIR</p>
					<input type="text" name=ttl id="ttl" value="{{$user->profile->ttl}}" readonly="readonly" required>
					@endforeach
					<div class="btn btn-update">
						<input type="submit" value="Update">
					</div>
				</div>
            </div>
        </div>
	</form>
	
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
document.getElementById('file-input').onchange = function () {
var file_name = this.value;
file_name = file_name.replace(/.*[\/\\]/, '');
$('.file-name').text(file_name);
}
</script>
<script>
var images = $('#upload-img').attr('src');
$(function(){
$('#file-input').change(function(event){
        var file = $("input[type=file]").get(0).files[0];
        if(file){
            var reader = new FileReader();
            reader.onload = function(){
                $("#upload-img").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
      	if(!file){
          $("#upload-img").attr("src", images);
        }
    });
});
</script>
<script>
$('.sign-berhasil .close').click(function(){
	$('.sign-berhasil').hide();
});
</script>
@endsection