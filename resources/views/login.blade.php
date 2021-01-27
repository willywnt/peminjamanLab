<!DOCTYPE>
<html>
	<head>
		<title>LAB FIK</title>
		<link rel ="stylesheet" type ="text/css" href ="{{asset('/css/style_login.css')}}"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="content-login">
			<div class="kotak-1">
				<img src="{{asset('/img/gambar.png')}}">
			</div>
			<div class="kotak-2">
				<div class="coloum-login">
					<div class="login">
						<h2>Masuk Sebagai<h2>
						<ul>
							<li class="mahasiswa active">Mahasiswa</li>
							<li class="dosen">Dosen</li>
						</ul>
						<form name="login" method="post" action="{{ url('/postlogin') }}" class="isi-form">
							@csrf
							<div class="form-group">
								<input type="text" name="username" id="username" class="uname" placeholder="NIM" value required pattern="[0-9]+" title="input harus angka">
								<!--<i class="fas fa-user"></i>-->
							</div>
							<div class="form-group">
								<input type="password" name="password" id="password" class="pass" placeholder="Password" value required>
								<!--<i class="fas fa-lock"></i>-->
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-login">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
		$('ul li').click(function() {
			$(this).addClass('active').siblings().removeClass('active');
			if($(".dosen").hasClass('active')){
				$(".uname").attr("placeholder", "NIP");
				$(".pass").attr("placeholder", "Password");
			}
			if($(".mahasiswa").hasClass('active')){
				$(".uname").attr("placeholder", "NIM");
				$(".pass").attr("placeholder", "Password");
			}
			$('input').val("");
		});
	});
	</script>
</html>