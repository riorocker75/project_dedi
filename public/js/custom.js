$(document).ready(function () {
    $(".snackbar").fadeIn();
    $(".snackbar").fadeOut(7000).delay(7000);
});
$(document).ready(function () {
    $(".snackbar-top").fadeIn();
    $(".snackbar-top").fadeOut(7000).delay(7000);
});

// $(document).ready(function () {
//     var tes;
//    $('#angsur').change(function () {
//     var value =  $(this).children("option:selected").val(); 
//     var rt = $('#tes-inp').val();
//     var xc= value+rt;
//     $('#plx').val(xc); 
//    });
// });

$(document).ready(function () {
    // cek format
    function addCommas(nStr)
    {   
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
    // end format
    $('#nominal' ).keyup(function() {
        var nominal = $( this ).val();
        var angsur =$('#angsur').children("option:selected").val(); 
        // var hs = Number(nominal)+Number(angsur);
        // $('#skenario').text("Rp."+addCommas(hs));
        if(nominal.length > 0){ 

            $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
              type:"post",
              url:"/anggota/cek-angsur",
              data:{nominal:nominal,angsur:angsur},
              success: function(data){          
                $('#skenario').html(data);
              }
            });
          }
    
  }).keyup();
});


