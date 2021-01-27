window.addEventListener('click', function(e){   
    if (document.getElementById('panel-user').contains(e.target)){
        // Clicked in box
        $('#myDropdown').toggleClass("show");
        $('.panel-user').toggleClass("active");
    } else{
        // Clicked outside the box
        if($('#myDropdown').hasClass("show")){
            $('#myDropdown').removeClass("show");
            $('.panel-user').removeClass("active");
        }	
    }

    // if (document.getElementById('icon-notifikasi').contains(e.target)){
    //     // Clicked in box
    //     $('#myNotifikasi').toggleClass("show");
    //     $('.icon-notifikasi').toggleClass("active");
    // } else{
    //     // Clicked outside the box
    //     if($('#myNotifikasi').hasClass("show")){
    //         $('#myNotifikasi').removeClass("show");
    //         $('.icon-notifikasi').removeClass("active");
    //     }	
    // }
});  

