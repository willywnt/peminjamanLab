@extends('layout/main')
@section('title','Lab 401')
<link rel ="stylesheet" type ="text/css" href ="{{asset('/css/style_peminjaman.css')}}"/>
<script src="{{asset('/js/times.js')}}"></script>

@section('container')
		<div class="banner">
			<div class="Home">
				<img src="{{asset('/img/banner-2.png')}}">
				<div class="judul">
					<h1>Peminjaman LAB</h1>
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
                <!-- <img class="bg-2" src="background-element-1.png"> -->
            </div>
            <div class="divide"></div>
            <div class="komputer">
                <p class="showed">Ruang LAB 401</p>
                <div class="comp-display">
                    <div class="comp">
                        <div class="btn menu sesi-menu" id="sesi-menu">
                            @if($days == "Sabtu" or $days == "Minggu")
                                <button class="btn-sesi sesi_1 expired">08:00 - 09.40</button>
                                <button class="btn-sesi sesi_2 expired">10.00 - 11.40</button>
                                <button class="btn-sesi sesi_3 expired">13.00 - 14.40</button>
                                <button class="btn-sesi sesi_4 expired">15:00 - 16.40</button>
                            @elseif($days != "Sabtu" and $days != "Minggu")
                                @if($time >= 390 and $time <= 579)
                                <button class="btn-sesi sesi_1 active" value="sesi_1">08:00 - 09.40</button>
                                <button class="btn-sesi sesi_2" value="sesi_2">10.00 - 11.40</button>
                                <button class="btn-sesi sesi_3" value="sesi_3">13.00 - 14.40</button>
                                <button class="btn-sesi sesi_4" value="sesi_4">15:00 - 16.40</button>
                                @elseif($time >= 600 and $time <= 699)
                                <button class="btn-sesi sesi_1 expired">08:00 - 09.40</button>
                                <button class="btn-sesi sesi_2 active" value="sesi_2">10.00 - 11.40</button>
                                <button class="btn-sesi sesi_3" value="sesi_3">13.00 - 14.40</button>
                                <button class="btn-sesi sesi_4" value="sesi_4">15:00 - 16.40</button>
                                @elseif($time >= 700 and $time <= 879)
                                <button class="btn-sesi sesi_1 expired">08:00 - 09.40</button>
                                <button class="btn-sesi sesi_2 expired">10.00 - 11.40</button>
                                <button class="btn-sesi sesi_3 active" value="sesi_3">13.00 - 14.40</button>
                                <button class="btn-sesi sesi_4" value="sesi_4">15:00 - 16.40</button>
                                @elseif($time >= 880 and $time <= 999)
                                <button class="btn-sesi sesi_1 expired">08:00 - 09.40</button>
                                <button class="btn-sesi sesi_2 expired">10.00 - 11.40</button>
                                <button class="btn-sesi sesi_3 expired">13.00 - 14.40</button>
                                <button class="btn-sesi sesi_4 active" value="sesi_4">15:00 - 16.40</button>
                                @elseif($time >= 1000 or $time <= 389)
                                <button class="btn-sesi sesi_1 expired">08:00 - 09.40</button>
                                <button class="btn-sesi sesi_2 expired">10.00 - 11.40</button>
                                <button class="btn-sesi sesi_3 expired">13.00 - 14.40</button>
                                <button class="btn-sesi sesi_4 expired">15:00 - 16.40</button>
                                @endif
                            @endif
                        </div>
                        <!--unit dosen-->
                        <div class="unit-dosen">
                            <div class="unit">
                                <img class="comp-0" src="{{asset('/img/comp-0.png')}}">
                                <p>00</p>
                            </div>
                        </div>
                        <form method="post" action="{{url('/peminjaman/pengajuan')}}">
                        @csrf
                        <input type="hidden" id="code_lab" name="code_lab" value="L401-">
                        <input type="hidden" id="name_lab" name="name_lab" value="LAB 401">
                        <div id="computer">
                        <input type="hidden" id="sesi" name="sesi" value="{{$sesi}}">
                        @php($count=1)
                        @if($days == "Sabtu" or $days == "Minggu")
                            @for($row = 0; $row < $jumlah/8 ; $row++)
                            <div class='unit-row-{{$row+1}}'>
                                @for($col = 0; $col < 8 ; $col++)
                                <div class='unit-comp'>
                                    <div class='unit'>
                                        <img id='comp-{{$count}}' src="{{asset('/img/comp-inactive.png')}}" class='inactive'>
                                        @if($count < 10)
                                            <p>0{{$count}}</p>
                                        @elseif($count >= 10)
                                            <p>{{$count}}</p>
                                        @endif
                                    </div>
                                </div>
                                @php($count++)
                                @endfor
                            </div>
                            @endfor
                        @elseif($days != "Sabtu" and $days != "Minggu")
                            @foreach ($computer->chunk(8) as $chunk)
                                <div class='unit-row-{{$loop->iteration}}'>
                                @foreach($chunk as $comp)
                                    <div class='unit-comp'>
                                        <div class='unit'>
                                            @if($comp->$sesi == "0")
                                                <img id='comp-{{$count}}' src="{{asset('/img/comp-available.png')}}" class='available'>
                                                @if($count < 10)
                                                    <p>0{{$count}}</p>
                                                @elseif($count >= 10)
                                                    <p>{{$count}}</p>
                                                @endif
                                            @endif
                                            @if($comp->$sesi == "1")
                                            <img id='comp-{{$count}}' src="{{asset('/img/comp-active.png')}}" class='not-available'>
                                                @if($count < 10)
                                                    <p>0{{$count}}</p>
                                                @elseif($count >= 10)
                                                    <p>{{$count}}</p>
                                                @endif
                                            @endif
                                            @if($comp->$sesi == "2")
                                            <img id='comp-{{$count}}' src="{{asset('/img/comp-pending.png')}}" class='pending'>
                                                @if($count < 10)
                                                    <p>0{{$count}}</p>
                                                @elseif($count >= 10)
                                                    <p>{{$count}}</p>
                                                @endif
                                            @endif
                                            @if($comp->$sesi == "expired")
                                            <img id='comp-{{$count}}' src="{{asset('/img/comp-inactive.png')}}" class='inactive'>
                                                @if($count < 10)
                                                    <p>0{{$count}}</p>
                                                @elseif($count >= 10)
                                                    <p>{{$count}}</p>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    @php($count++)
                                @endforeach
                                </div>
                            @endforeach
                        @endif
                        </div>
                        @if(!($sesi == "sesi_expired") and $days != "Sabtu" and $days != "Minggu")
                        <button type="submit" value="Submit" class="pinjam">Pinjam</button>
                        @endif
                    </div>
                    </form>
                </div>
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

<input type="hidden" name="available" value="{{asset('/img/comp-available.png')}}" id="available" />
<input type="hidden" name="not-available" value="{{asset('/img/comp-active.png')}}" id="not-available" />
<input type="hidden" name="pending" value="{{asset('/img/comp-pending.png')}}" id="pending" />
<input type="hidden" name="inactive" value="{{asset('/img/comp-inactive.png')}}" id="inactive" />
<input type="hidden" name="selected" value="{{asset('/img/comp-selected.png')}}" id="selected" />
<script src="{{asset('/js/calender.js')}}"></script>
@if(auth()->user()->level == "mahasiswa")
<script src="{{asset('/js/comp_mhs.js')}}"></script>
@endif
@if(auth()->user()->level == "dosen")
<script src="{{asset('/js/comp_dosen.js')}}"></script>
@endif
<script src="{{asset('/js/dropdown.js')}}"></script>
<script>
$('.sign-berhasil .close').click(function(){
    $('.sign-berhasil').hide();
});
</script>
<script>
$(document).ready(function(){
    $(document).on('click','.btn-sesi',function(){
        if($('.btn-sesi').hasClass('active')){
            $('.btn-sesi').removeClass('active');
            $(this).addClass('active');
            var sesi = $(this).val();
            $("#computer").html("");
        }
        else {
            $(this).addClass('active');
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{url('/ajax_401')}}",
            type: "get",
            data: {sesi:sesi},
            success: function(data){ // What to do if we succeed
                var comp_text = "";
                var count = 1;
                comp_text += "<input type='hidden' id='sesi' name='sesi' value='"+Object.keys(data[0])+"'></input>";
                for(var row = 0; row < data.length/8; row++){
                    comp_text += "<div class='unit-row-" + (row+1) + "'>";
                    for (var col = 0; col < 8; col++) {
                        comp_text +="<div class='unit-comp'>";
                        comp_text +="<div class='unit'>";
                        
                        if(Object.keys(data[0]) == "sesi_1"){
                            if(data[count-1].sesi_1 == '0'){
                                comp_text += "<img id='comp-" + count + "'src='{{asset('/img/comp-available.png')}}' class='available'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_1 == '1'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-active.png')}}' class='not-available'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_1 == '2'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-pending.png')}}' class='pending'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_1 == 'expired'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-inactive.png')}}' class='inactive'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                        }
                        if(Object.keys(data[0]) == "sesi_2"){
                            if(data[count-1].sesi_2 == '0'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-available.png')}}' class='available'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_2 == '1'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-active.png')}}' class='not-available'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_2 == '2'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-pending.png')}}' class='pending'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_2 == 'expired'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-inactive.png')}}' class='inactive'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                        }
                        if(Object.keys(data[0]) == "sesi_3"){
                            if(data[count-1].sesi_3 == '0'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-available.png')}}' class='available'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_3 == '1'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-active.png')}}' class='not-available'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_3 == '2'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-pending.png')}}' class='pending'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_3 == 'expired'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-inactive.png')}}' class='inactive'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                        }
                        if(Object.keys(data[0]) == "sesi_4"){
                            if(data[count-1].sesi_4 == '0'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-available.png')}}' class='available'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_4 == '1'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-active.png')}}' class='not-available'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_4 == '2'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-pending.png')}}' class='pending'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_4 == 'expired'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-inactive.png')}}' class='inactive'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                        }
                        comp_text +="</div>";
                        comp_text +="</div>";
                        count++;
                    }
                    comp_text +="</div>";
                }
                $('#computer').append(comp_text);
            } 
        });
    });
});
</script>
@endsection