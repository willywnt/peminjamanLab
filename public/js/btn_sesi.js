$(document).ready(function(){
    $(document).on('click','.btn-sesi',function(){
        if($('.btn-sesi').hasClass('active')){
            $('.btn-sesi').removeClass('active')
            $(this).addClass('active')
            var sesi = $(this).val();
            $("#computer").html("");
        }
        else {
            $(this).addClass('active')
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
            },
            url:"/sekret",
            type: "get",
            data: {sesi:sesi},
            success: function(data){ // What to do if we succeed
                var comp_text = "";
                // console.log(data.length);
                // console.log(data);
                // console.log(Object.keys(data[0]));
                var count = 1;
                comp_text += "<input type='hidden' id='sesi' name='sesi' value='"+Object.keys(data[0])+"'></input>";
                for(var row = 0; row < data.length/8; row++){
                    comp_text += "<div class='unit-row-" + (row+1) + "'>"
                    for (var col = 0; col < 8; col++) {
                        comp_text +="<div class='unit-comp'>"
                        comp_text +="<div class='unit'>"
                        
                        if(Object.keys(data[0]) == "sesi_1"){
                            if(data[count-1].sesi_1 == '0'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-available.png' class='available'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                            if(data[count-1].sesi_1 == '1'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-active.png' class='not-available'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                            if(data[count-1].sesi_1 == '2'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-pending.png' class='pending'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                            if(data[count-1].sesi_1 == 'expired'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-inactive.png' class='inactive'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                        }
                        if(Object.keys(data[0]) == "sesi_2"){
                            if(data[count-1].sesi_2 == '0'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-available.png' class='available'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                            if(data[count-1].sesi_2 == '1'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-active.png' class='not-available'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                            if(data[count-1].sesi_2 == '2'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-pending.png' class='pending'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                            if(data[count-1].sesi_2 == 'expired'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-inactive.png' class='inactive'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                        }
                        if(Object.keys(data[0]) == "sesi_3"){
                            if(data[count-1].sesi_3 == '0'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-available.png' class='available'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                            if(data[count-1].sesi_3 == '1'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-active.png' class='not-available'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                            if(data[count-1].sesi_3 == '2'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-pending.png' class='pending'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                            if(data[count-1].sesi_3 == 'expired'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-inactive.png' class='inactive'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                        }
                        if(Object.keys(data[0]) == "sesi_4"){
                            if(data[count-1].sesi_4 == '0'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-available.png' class='available'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                            if(data[count-1].sesi_4 == '1'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-active.png' class='not-available'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                            if(data[count-1].sesi_4 == '2'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-pending.png' class='pending'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                            if(data[count-1].sesi_4 == 'expired'){
                                comp_text += "<img id='comp-" + count + "' src='/img/comp-inactive.png' class='inactive'>"
                                if(count < 10){
                                    comp_text += "<p>0"+count+"</p>"
                                }
                                if(count >= 10){
                                    comp_text += "<p>"+count+"</p>"
                                }
                            }
                        }
                        comp_text +="</div>"
                        comp_text +="</div>"
                        count++
                    }
                    comp_text +="</div>"
                }
                $('#computer').append(comp_text);
            }
        });
    });
});