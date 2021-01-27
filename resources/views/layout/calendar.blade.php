<!--Calender-->
<div class="calendar">
    <div class="front">
        <div class="current-date">
            <div>
                <div id="today"></div>
                <div id="current-time">Loading...</div>
            </div>
            <div>
                <h1 id="current-day"></h1>
                <h1 id="current-month"></h1>
            </div>	
        </div>
     
        <div class="current-month">
            <ul class="week-days">
                <li>SUN</li>
                <li>MON</li>
                <li>TUE</li>
                <li>WED</li>
                <li>THU</li>
                <li>FRI</li>
                <li>SAT</li>
            </ul>
            <div class="weeks"></div>
        </div>
        
        <div class="btn-jadwal" onclick="CalendarFunction()">
            <p>Lihat Jadwal</p>
        </div>
    </div>
            
    <div class="back">
        <div class="info">
            <div class="title">    
                <img src="{{asset('/img/calendar.png')}}">
                <h1 class="hari"></h1>
            </div>
            @foreach($jadwal_kls as $kelas)
            
                @if($kelas->hari == $days)
                <div class="list">
                    <p class="matkul">Matkul : {{$kelas->matkul}}</p>
                    <p>Waktu : {{$kelas->waktu}}</p>
                    <p>Ruang : {{$kelas->ruang}}</p>
                    <hr>
                </div>
                @endif
            @endforeach
        </div>
        <div class="btn-kembali">
            <p>Kembali</p>
        </div>
    </div>
</div>