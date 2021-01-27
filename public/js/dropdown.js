window.addEventListener('click', function(e){   
    if (document.getElementById('btn-lab-1').contains(e.target)){
        // Clicked in box
        $('.lab-sekret').addClass("active-dropdown");
        $('.lab-lt-2').removeClass("active-dropdown");
        $('.lab-lt-3').removeClass("active-dropdown");
        $('.lab-lt-4').removeClass("active-dropdown");

        $('.dropdown-content-1').removeClass("show-menu");
        $('.lab-lt-2').removeClass("active-dropdown");
        $('.arrow-2').removeClass("rotated");

        $('.dropdown-content-2').removeClass("show-menu");
        $('.lab-lt-3').removeClass("active-dropdown");
        $('.arrow-3').removeClass("rotated");

        $('.dropdown-content-3').removeClass("show-menu");
        $('.lab-lt-4').removeClass("active-dropdown");
        $('.arrow-4').removeClass("rotated");
    }
    if (document.getElementById('btn-lab-3').contains(e.target)){
        // Clicked in box
        $('.dropdown-content-2').toggleClass("show-menu");
        $('.lab-lt-3').toggleClass("active-dropdown");
        $('.lab-sekret').removeClass("active-dropdown");
        $('.arrow-3').toggleClass("rotated");

        $('.dropdown-content-1').removeClass("show-menu");
        $('.lab-lt-2').removeClass("active-dropdown");
        $('.arrow-2').removeClass("rotated");

        $('.dropdown-content-3').removeClass("show-menu");
        $('.lab-lt-4').removeClass("active-dropdown");
        $('.arrow-4').removeClass("rotated");
    }
    if (document.getElementById('btn-lab-4').contains(e.target)){
        // Clicked in box
        $('.dropdown-content-3').toggleClass("show-menu");
        $('.lab-lt-4').toggleClass("active-dropdown");
        $('.lab-sekret').removeClass("active-dropdown");
        $('.arrow-4').toggleClass("rotated");

        $('.dropdown-content-1').removeClass("show-menu");
        $('.lab-lt-2').removeClass("active-dropdown");
        $('.arrow-2').removeClass("rotated");

        $('.dropdown-content-2').removeClass("show-menu");
        $('.lab-lt-3').removeClass("active-dropdown");
        $('.arrow-3').removeClass("rotated");
    }
});