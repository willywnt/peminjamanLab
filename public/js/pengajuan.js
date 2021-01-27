$('.pengajuan').hide();
        $('.pinjam').click(function(){
            $('.comp-display').hide();
            $('.pengajuan').show();
            str1 = $('p.showed').html();
            pinjam = str1+" > Pengajuan";
            //console.log(pinjam)
            $('p.showed').html(pinjam);
        });
        $('.batal').click(function(){
            $('.comp-display').show();
            $('.pengajuan').hide();
            $('p.showed').replaceWith(str);
        });