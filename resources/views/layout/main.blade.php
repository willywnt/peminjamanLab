<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
		<link rel ="stylesheet" type ="text/css" href ="{{asset('/css/style_header.css')}}"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
		<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<script src="{{asset('/js/menu.js')}}"></script>
	</head>
	<body onload="startTime()">
		<div class="header">
			<div class="logo">
				<a href="/"><img src="{{asset('/img/Logo_UPNVJ.png')}}">
			</div>
			<div class="fik">
				<p>FAKULTAS ILMU KOMPUTER</p>
				<p class="newline">UPN VETERAN JAKARTA</p>
			</div></a>
			<div class="panel">
				<div class="panel-user" id="panel-user">
					<div class="gambar-user">
					@if(!auth()->user()->avatar)
					<img src="{{asset('/img/default-foto.png')}}" alt="avatar">
					@endif
					@if(auth()->user()->avatar)
						<img src="{{asset('/storage/images/'.auth()->user()->avatar)}}" alt="avatar">
					@endif
					</div>
					<div class="user">
						<p>{{ auth()->user()->name }}</p>
					</div>
					<div class="panah">
						<i class="fas fa-sort-down"></i>
					</div>
				</div>
			</div>
			<div class="dropdown-content" id="myDropdown">
                <a href="{{ url('/profil/'.auth()->user()->id) }}">Profil<i class="fas fa-user"></i></a>
                <a href="{{ url('/password') }}">Password<i class="fas fa-key"></i></a>
				<a href="{{ url('/logout') }}">Log Out<i class="fas fa-sign-out-alt"></i></a>
            </div> 
        </div>
        
        @yield('container')
        
		<div class="footer">
			<p>PeminjamanLAB Company Project, Copyright &copy; 2020</p>
		</div>
	</body>
</html>