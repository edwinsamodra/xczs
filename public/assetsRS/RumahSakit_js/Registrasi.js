// $.ajaxSetup({
//     headers: {
//         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//     }
// });

$(document).ready(function() {
    
    $("#cariPasien").keyup(function() {
        $.ajax({
            type: "GET",
            url: "/RScariPasien",
            data: 'format=html&keyword=' + $(this).val(),
            beforeSend: function() {
            },
            success: function(data) {
                $('#suggestion-box').html(data);
                $('#suggestion-box').show();

                $(".list-item").last().css("border-bottom-left-radius", "10px");
                $(".list-item").last().css("border-bottom-right-radius", "10px");

            }
        });

        $(document).on('click', '.list-item', function(event) {
            const dataId = $(this).attr('data-id');
            const nama = $(this).html();
            console.log(nama);
            $('#cariPasien').val(nama);
            
            $('#idPasien').val(dataId);
            $('#suggestion-box').hide();
            
        });
    });

    
 
    $("#take").click(function() {
        console.log('click');        
        $('#modalTakepicture').modal('show');        
    });
   


    $("#pencarian").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');        
        $('#poliklinik').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#laboratorium').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#radiologi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#igd').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#mcu').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#odc').attr('class', 'pmenu col btn btn-sm m-2');        
    });
    $("#poliklinik").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');  
        $('#pencarian').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#laboratorium').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#radiologi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#igd').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#mcu').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#odc').attr('class', 'pmenu col btn btn-sm m-2');       
    });
    $("#laboratorium").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');
        $('#poliklinik').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pencarian').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#radiologi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#igd').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#mcu').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#odc').attr('class', 'pmenu col btn btn-sm m-2');       
    });
    $("#radiologi").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');
        $('#poliklinik').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#laboratorium').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pencarian').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#igd').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#mcu').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#odc').attr('class', 'pmenu col btn btn-sm m-2');        
    });
    $("#igd").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');
        $('#poliklinik').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#laboratorium').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#radiologi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pencarian').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#mcu').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#odc').attr('class', 'pmenu col btn btn-sm m-2');         
    });
    $("#mcu").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');
        $('#poliklinik').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#laboratorium').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#radiologi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#igd').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pencarian').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#odc').attr('class', 'pmenu col btn btn-sm m-2');         
    });
    $("#odc").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');
        $('#poliklinik').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#laboratorium').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#radiologi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#igd').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#mcu').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pencarian').attr('class', 'pmenu col btn btn-sm m-2');         
    });

    //pasien

    $("#pasienpoliklinik").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');        
        $('#pasienlaboratorium').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienradiologi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienigd').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienmcu').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienodc').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienfisioterapi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienpenunjang').attr('class', 'pmenu col btn btn-sm m-2');        
    });

    $("#pasienlaboratorium").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');        
        $('#pasienpoliklinik').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienradiologi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienigd').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienmcu').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienodc').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienfisioterapi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienpenunjang').attr('class', 'pmenu col btn btn-sm m-2');        
    });
    $("#pasienradiologi").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');        
        $('#pasienpoliklinik').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienlaboratorium').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienigd').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienmcu').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienodc').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienfisioterapi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienpenunjang').attr('class', 'pmenu col btn btn-sm m-2');        
    });
    $("#pasienigd").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');        
        $('#pasienpoliklinik').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienlaboratorium').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienradiologi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienmcu').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienodc').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienfisioterapi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienpenunjang').attr('class', 'pmenu col btn btn-sm m-2');        
    });
    $("#pasienmcu").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');        
        $('#pasienpoliklinik').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienlaboratorium').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienradiologi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienigd').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienodc').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienfisioterapi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienpenunjang').attr('class', 'pmenu col btn btn-sm m-2');        
    });
    $("#pasienodc").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');        
        $('#pasienpoliklinik').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienlaboratorium').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienradiologi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienigd').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienmcu').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienfisioterapi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienpenunjang').attr('class', 'pmenu col btn btn-sm m-2');        
    });
    $("#pasienfisioterapi").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');        
        $('#pasienpoliklinik').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienlaboratorium').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienradiologi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienigd').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienmcu').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienodc').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienpenunjang').attr('class', 'pmenu col btn btn-sm m-2');        
    });
    $("#pasienpenunjang").click(function() {
        console.log('c');
        $(this).attr('class', 'pmenu-active col btn btn-sm m-2');        
        $('#pasienpoliklinik').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienlaboratorium').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienradiologi').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienigd').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienmcu').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienodc').attr('class', 'pmenu col btn btn-sm m-2');        
        $('#pasienfisioterapi').attr('class', 'pmenu col btn btn-sm m-2');        
    });





   
});
