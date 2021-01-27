@extends('layout/template')
@section('title','Computer LAB')
@section('title-content','Computer LAB')
@section('content','Computer')
<style>
.no-comp{
  left: 50%;
  top: 50%;
  transform: translate(-70%,-55%);
  font-size: 1.8em;
  font-weight: 550;
  position :absolute;
}
</style>
@section('container')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Display Computer</h3>
    </div>

    <div class="card-body">
        <h4>Pilih LAB</h4>
        <div class="btn-group-vertical">
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-lab btn-outline-primary active" value="lab_sekret">Sekret</button>
                <button type="button" class="btn btn-lab btn-outline-primary" value="lab_301">301</button>
                <button type="button" class="btn btn-lab btn-outline-primary" value="lab_302">302</button>
                <button type="button" class="btn btn-lab btn-outline-primary" value="lab_303">303</button>
            </div>
            <div class="btn-group" role="group">
                <button type="button" class="btn btn-lab btn-outline-primary" value="lab_401">401</button>
                <button type="button" class="btn btn-lab btn-outline-primary" value="lab_402">402</button>
                <button type="button" class="btn btn-lab btn-outline-primary" value="lab_403">403</button>
            </div>
        </div>
        <h4 class="mt-4">Pilih Hari</h4>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-hari btn-outline-primary active" value="Senin">Senin</button>
            <button type="button" class="btn btn-hari btn-outline-primary" value="Selasa">Selasa</button>
            <button type="button" class="btn btn-hari btn-outline-primary" value="Rabu">Rabu</button>
            <button type="button" class="btn btn-hari btn-outline-primary" value="Kamis">Kamis</button>
            <button type="button" class="btn btn-hari btn-outline-primary" value="Jumat">Jumat</button>
        </div>
        <h4 class="mt-4">Pilih JAM</h4>
        <div class="btn-group" role="group">
            <button type="button" class="btn btn-sesi btn-outline-primary active" value="sesi_1">08:00 - 09:40</button>
            <button type="button" class="btn btn-sesi btn-outline-primary" value="sesi_2">10:00 - 11:40</button>
            <button type="button" class="btn btn-sesi btn-outline-primary" value="sesi_3">13:00 - 14:40</button>
            <button type="button" class="btn btn-sesi btn-outline-primary" value="sesi_4">15:00 - 16:40</button>
        </div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-auto mr-5 mb-5">
                    <img class="comp-0 img-fluid" src="{{asset('/img/comp-0.png')}}">
                    <p class="no-comp">00</p>
                </div>
                <div class="w-100"></div>
                @foreach ($computer as $comp)
                <div class="col-auto mr-5 mb-3">
                    @if($comp->sesi_1 == "0")
                        <img id='comp-{{$loop->iteration}}' src="{{asset('/img/comp-available.png')}}" class='available img-fluid'>
                        @if($loop->iteration < 10)
                            <p class="no-comp">0{{$loop->iteration}}</p>
                        @elseif($loop->iteration >= 10)
                            <p class="no-comp">{{$loop->iteration}}</p>
                        @endif
                    @endif
                    @if($comp->sesi_1 == "1")
                    <img id='comp-{{$loop->iteration}}' src="{{asset('/img/comp-active.png')}}" class='not-available img-fluid'>
                        @if($loop->iteration < 10)
                            <p class="no-comp">0{{$loop->iteration}}</p>
                        @elseif($loop->iteration >= 10)
                            <p class="no-comp">{{$loop->iteration}}</p>
                        @endif
                    @endif
                    @if($comp->sesi_1 == "2")
                    <img id='comp-{{$loop->iteration}}' src="{{asset('/img/comp-pending.png')}}" class='pending img-fluid'>
                        @if($loop->iteration < 10)
                            <p class="no-comp">0{{$loop->iteration}}</p>
                        @elseif($loop->iteration >= 10)
                            <p class="no-comp">{{$loop->iteration}}</p>
                        @endif
                    @endif
                    @if($comp->sesi_1 == "expired")
                    <img id='comp-{{$loop->iteration}}' src="{{asset('/img/comp-inactive.png')}}" class='inactive img-fluid'>
                        @if($loop->iteration < 10)
                            <p class="no-comp">0{{$loop->iteration}}</p>
                        @elseif($loop->iteration >= 10)
                            <p class="no-comp">{{$loop->iteration}}</p>
                        @endif
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
$(document).ready(function() {
  var sesi = "sesi_1";
  var ruangan = "lab_sekret";
  var hari = "Senin";

    $(document).on('click','.btn-lab',function(){
      if($('.btn-lab').hasClass('active')){
            $('.btn-lab').removeClass('active');
            $(this).addClass('active');
            ruangan = $(this).val();
        }
        else {
            $(this).addClass('active');
        }
    });

    $(document).on('click','.btn-hari',function(){
      if($('.btn-hari').hasClass('active')){
            $('.btn-hari').removeClass('active');
            $(this).addClass('active');
            hari = $(this).val();
        }
        else {
            $(this).addClass('active');
        }
    });

    $(document).on('click','.btn-sesi',function(){
      if($('.btn-sesi').hasClass('active')){
            $('.btn-sesi').removeClass('active');
            $(this).addClass('active');
            sesi = $(this).val();
        }
        else {
            $(this).addClass('active');
        }
    });

    $(document).on('click','.btn',function(){
      $(".container").html("");
      $.ajax({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url:"{{url('/ajax_display')}}",
            type: "get",
            data: {
              sesi:sesi,
              ruangan:ruangan,
              hari:hari
            },
            success: function(data){ // What to do if we succeed
                var comp_text = "";
                var count = 1;
                comp_text += "<div class='row justify-content-end'>";
                comp_text += "<div class='col-auto mr-5 mb-5'>";
                comp_text += "<img class='comp-0 img-fluid' src='{{asset('/img/comp-0.png')}}'>";
                comp_text += "<p class='no-comp'>00</p>";
                comp_text += "</div>";
                comp_text += "<div class='w-100'></div>";
                for(var row = 0; row < data.length; row++){
                    comp_text += "<div class='col-auto mr-5 mb-3'>";
                        if(Object.keys(data[0]) == "sesi_1"){
                            if(data[count-1].sesi_1 == '0'){
                                comp_text += "<img id='comp-" + count + "'src='{{asset('/img/comp-available.png')}}' class='available img-fluid'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_1 == '1'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-active.png')}}' class='not-available img-fluid'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_1 == '2'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-pending.png')}}' class='pending img-fluid'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_1 == 'expired'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-inactive.png')}}' class='inactive img-fluid'>";
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
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-available.png')}}' class='available img-fluid'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_2 == '1'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-active.png')}}' class='not-available img-fluid'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_2 == '2'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-pending.png')}}' class='pending img-fluid'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_2 == 'expired'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-inactive.png')}}' class='inactive img-fluid'>";
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
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-available.png')}}' class='available img-fluid'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_3 == '1'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-active.png')}}' class='not-available img-fluid'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_3 == '2'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-pending.png')}}' class='pending img-fluid'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_3 == 'expired'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-inactive.png')}}' class='inactive img-fluid'>";
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
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-available.png')}}' class='available img-fluid'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_4 == '1'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-active.png')}}' class='not-available img-fluid'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_4 == '2'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-pending.png')}}' class='pending img-fluid'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                            if(data[count-1].sesi_4 == 'expired'){
                                comp_text += "<img id='comp-" + count + "' src='{{asset('/img/comp-inactive.png')}}' class='inactive img-fluid'>";
                                if(count < 10){
                                    comp_text += "<p class='no-comp'>0"+count+"</p>";
                                }
                                if(count >= 10){
                                    comp_text += "<p class='no-comp'>"+count+"</p>";
                                }
                            }
                        }
                        comp_text +="</div>";
                        count++;
                    }
                    comp_text +="</div>";
                $('.container').append(comp_text);
             } 
        });
    });
});
</script>
