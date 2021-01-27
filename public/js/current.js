kode1 = "LS-";
        ruang = "LAB Sekret";
        function check_current(current){
            if(current == "menu-0"){
                $('p.showed').replaceWith("<p class='showed'>Ruang LAB Sekret</p>");
                kode1 = "LS-";
                ruang = "LAB Sekret";
            }
            if(current == "menu-1"){
                $('p.showed').replaceWith("<p class='showed'>Ruang LAB 301</p>");
                kode1 = "L3-301-";
                ruang = "LAB 301";
            }
            if(current == "menu-2"){
                $('p.showed').replaceWith("<p class='showed'>Ruang LAB 302</p>");
                kode1 = "L3-302-";
                ruang = "LAB 302";
            }
            if(current == "menu-3"){
                $('p.showed').replaceWith("<p class='showed'>Ruang LAB 303</p>");
                kode1 = "L3-303-";
                ruang = "LAB 303";
            }
            if(current == "menu-4"){
                $('p.showed').replaceWith("<p class='showed'>Ruang LAB 401</p>");
                kode1 = "L4-401-";
                ruang = "LAB 401";
            }
            if(current == "menu-5"){
                $('p.showed').replaceWith("<p class='showed'>Ruang LAB 402</p>");
                kode1 = "L4-402-";
                ruang = "LAB 402";
            }
            if(current == "menu-6"){
                $('p.showed').replaceWith("<p class='showed'>Ruang LAB 403</p>");
                kode1 = "L4-403-";
                ruang = "LAB 403";
            }
            $('#ruang').attr("value",ruang);
        }

        $(".dropdown #menu").click(function() {
            menu = this.className.split(' ')[0];
            $('.menu.current').removeClass('current');
            $("."+menu).addClass('current');
            if($('.pengajuan').is(":hidden")){
                check_current(menu);
            }
        });
        $("#btn-lab-1").click(function() {
            menu = this.className.split(' ')[0];
            $('.menu.current').removeClass('current');
            $("."+menu).addClass('current');
            if($('.pengajuan').is(":hidden")){
                check_current(menu);
            }
        });