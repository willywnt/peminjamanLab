@extends('layout/main')
@section('title','Ganti Password')
<link rel ="stylesheet" type ="text/css" href ="{{asset('/css/style_password.css')}}"/>

@section('container')
		<div class="banner">
			<div class="Home">
				<img src="{{asset('/img/banner.png')}}">
				<div class="judul">
					<h1>GANTI PASSWORD</h1>
					<p>Password</p>
				</div>
			</div>
		</div>
		<div class="container-main">
            <div class="title">
				<h1>Ganti Password</h1>
			</div>
			<div class="form-password">
				<form method="POST" action="{{ url ('/password') }}">
				@csrf
					<p>Password Lama</p>
					<input type="password" name="current_password" id="current_password" required>
					@error('current_password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<p>Password Baru</p>
					<input type="password" name="new_password" id="new_password" required>
					<p>Konfirmasi Password</p>
					<input type="password" name="new_confirm_password" id="new_confirm_password" required>
					@error('new_confirm_password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
					<div class="btn btn-control">
						<button type="reset">Reset</button>
						<button type="submit" class="update">Update</button>
					</div>
				</form>
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