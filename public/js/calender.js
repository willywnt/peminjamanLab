$(".back").hide();
        $(".btn-jadwal").on('click', function(){
            $('.calendar').toggleClass('flip');
            $(".front").fadeOut(900);
            $(".front").hide();
            $(".back").show();
        });
        $(".btn-kembali").on('click', function(){
            $('.calendar').toggleClass('flip');
            $(".back").fadeOut(900);
            $(".back").hide();
            $(".front").show();
        });