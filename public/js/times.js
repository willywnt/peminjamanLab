function startTime() {
    var now = new Date();
    var day = now.getUTCDay();
    var date = now.getDate();
    var M = now.getMonth();
    var months = getMonthName(M);
    var year = now.getYear();
    if (year < 1000){
        year += 1900
    }
    now = null;

    // create instance of first day of month, and extract the day on which it occurs
    var firstDayInstance = new Date(year, M, 1);
    var firstDay = firstDayInstance.getDay();
    firstDayInstance = null;
    day = checkDay(day);
    
    const nth = function(d) {
        if (d > 3 && d < 21) return 'th';
        switch (d % 10) {
          case 1:  return "st";
          case 2:  return "nd";
          case 3:  return "rd";
          default: return "th";
        }
      }

    // number of days in current month
    var days = getDays(M, year);

    // call function to draw calendar
    createCal(firstDay + 1, days, date, M, year);

    $('#tanggal').attr("value", date + " " + months + " " + year);
    document.getElementById('today').innerHTML = day;
    document.getElementById('current-day').innerHTML = date +" "+nth(date);
    document.getElementById('current-month').innerHTML = months + " " + year;

    // $("span").on('click', function(){
    //     $("span.active").removeClass('active');
    //     $(this).addClass('active');
    // });

    realTime();
}

function CalendarFunction() {
    if($("span").hasClass('active')){
        var now = new Date();
        //now.;
        M = now.getMonth();
        months = getMonthName(M);
        year = now.getYear();
        if (year < 1000){
            year += 1900
        }
        var select_date = $('span.active').text();
        var select = months +' '+ select_date +', '+ year;
        var selected = new Date(select);
        day1 = selected.getDay();
        day1 = cekHari(day1);
        $('h1.hari').html('Jadwal Hari '+day1);
    }
}

function realTime(){
    var now = new Date();
    var h = now.getHours();
    var m = now.getMinutes();
    var s = now.getSeconds();
    
     //create current times
    m = checkTime(m);
    s = checkTime(s);
    
    document.getElementById('current-time').innerHTML =  h + ":" + m + ":" + s;
    var t = setTimeout(realTime, 500);
}
function createCal(firstDay, lastDate, date, M, year){
    var text = "" // initialize accumulative variable to empty string
    
    // declaration and initialization of two variables to help with tables
    var digit = 1;
    var curCell = 1;
    var lastmonth = getDays(M-1, year);
    //var counter = lastmonth;
    for (var row = 1; row <= Math.ceil((lastDate + firstDay - 1) / 7); ++row) {
        text += "<div class='row-" + row + "'>"
        for (var col = 1; col <= 7; ++col) {
            if (digit > lastDate){
                last = 8-col
                nextmonth = 1
                while(last != 0){
                    text += '<span class="next-month">'+nextmonth+'</span>'
                    last--
                    nextmonth++
                }
                break
            }
            if (curCell < firstDay) {
                text += '<span class="last-month">'+(lastmonth+1 - (firstDay-1))+'</span>'
                curCell++
                lastmonth++
                
            } else {
                if (digit == date) { // current cell represent today's date
                text += '<span class="active">'
                text += digit
                text += '</span>'
                } else
                text += '<span>' + digit + '</span>'
                digit++
            }
        }
        text += '</div>'
    }
    $(".weeks").append(text);
}

function getDays(month, year) {
if(month == -1){
    month = 0;
}
// create array to hold number of days in each month
var ar = new Array(12)
ar[0] = 31 // January
ar[1] = (leapYear(year)) ? 29 : 28 // February
ar[2] = 31 // March
ar[3] = 30 // April
ar[4] = 31 // May
ar[5] = 30 // June
ar[6] = 31 // July
ar[7] = 31 // August
ar[8] = 30 // September
ar[9] = 31 // October
ar[10] = 30 // November
ar[11] = 31 // December

// return number of days in the specified month (parameter)
return ar[month]
}
function getMonthName(month) {
// create array to hold name of each month
var ar = new Array(12)
    ar[0] = "January"
    ar[1] = "February"
    ar[2] = "March"
    ar[3] = "April"
    ar[4] = "May"
    ar[5] = "June"
    ar[6] = "July"
    ar[7] = "August"
    ar[8] = "September"
    ar[9] = "October"
    ar[10] = "November"
    ar[11] = "December"

    // return name of specified month (parameter)
    return ar[month]
}

function checkDay(day){
    var ar = new Array(7)
    ar[0] = "Sunday";
    ar[1] = "Monday";
    ar[2] = "Tuesday";
    ar[3] = "Wednesday";
    ar[4] = "Thursday";
    ar[5] = "Friday";
    ar[6] = "Saturday";
        
    return ar[day]  
}

function cekHari(day1){
    var hr = new Array(7)
    hr[0] = "Minggu";
    hr[1] = "Senin";
    hr[2] = "Selasa";
    hr[3] = "Rabu";
    hr[4] = "Kamis";
    hr[5] = "Jumat";
    hr[6] = "Sabtu";
        
    return hr[day1]  
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}
function leapYear(year) {
if (year % 4 == 0) // basic rule
    return true // is leap year
    /* else */ // else not needed when statement is "return"
return false // is not leap year
}