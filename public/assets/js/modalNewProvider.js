$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  
function simpanDataProvider(
    idProvider,
    txtNama,
    txtAlamat,
    txtNomorTelepon,
    txtContactPerson,
    lstPartnershipScheme,
    lstProviderCategory,
    chkIsActive,
) {
    const formData = new FormData($('form')[0]);

    formData.append('frmDataProvider_id', idProvider);    
    formData.append('nama', txtNama);
    formData.append('alamat', txtAlamat);
    formData.append('nomor_telepon', txtNomorTelepon);
    formData.append('contact_person', txtContactPerson);
    formData.append('id_partnership_scheme', lstPartnershipScheme);
    formData.append('id_provider_category', lstProviderCategory);
    formData.append('is_active', chkIsActive);


    $.ajax({
        type: "POST",
        url: "/provider",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function() {
            // todo:
        },
        success: function(data) { 
            console.log(data);
            Swal.fire({
                title: 'Info!',
                text: 'Data telah disimpan',
                icon: 'success',
                confirmButtonText: 'Tutup',
                target: '#modalTambahDataProvider'
            }).then(
                function (isConfirm) {
                  if (isConfirm) {
                    console.log('CONFIRMED');
                    location.reload(true);
                  }
                },
                function() {
                   console.log('BACK');
                }
            );
        }
    });
}


$(document).ready(function(){

    $('#btnTambahDataProvider').click(function(){
        $('#modalInputLabel').html('Tambah Data Provider');
        $('#frmDataProvider_action').val('add');
        $('#frmDataProvider_id').val(0);
        $('#modalTambahDataProvider').modal('show');
    });

    $('#btnEditProvider').click(function(){
        const idProvider = $(this).data("id");
        $('#modalInputLabel').html('Edit Data Provider');
        $('#frmDataProvider_action').val('update');
        $('#frmDataProvider_id').val(idProvider);
    });

    $('.btnDeleteProvider').click(function(){
        const idProvider = $(this).data("id");        
        console.log(idProvider);

        bootbox.confirm({
            title: "Data Provider",
            message: "Yakin hapus data provider?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Batal'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Ya'
                }
            },
            callback: function (result) {
                if (result === true){
                    $.ajax({
                        type: "POST",
                        url: "/provider/delete",
                        data: { 
                            'id': idProvider
                        },
                        beforeSend: function() {
                            // todo:
                        },
                        success: function(response) {
                            if (response.error === 0) {
                                iconStr = 'success';
                            } else {
                                iconStr = 'error';
                            }

                            Swal.fire({
                                title: 'Info!',
                                text: response.message,
                                icon: iconStr,
                                confirmButtonText: 'Tutup'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload(true);
                                }
                            })                            
                        }
                    });
                }
            }
        });
    });


    $('.btnEditProvider').click(function(){
        const idProvider = $(this).data("id");
        $('#modalInputLabel').html('Edit Data Provider');
        $('#frmDataProvider_action').val('update');
        $('#frmDataProvider_id').val(idProvider);
        $('#btnNewProviderSubmit').html('Update Provider');

        // send ajax request
        $.ajax({
            type: "GET",
            url: "/provider/" + idProvider,
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {   
                console.log(data);
                const idPartnershipScheme = data.id_partnership_scheme;
                const idProviderCategory = data.id_provider_category;
                const isActive = data.is_active;
                $('#txtNama').val(data.nama);
                $('#txtAlamat').val(data.alamat);
                $('#txtNomorTelepon').val(data.nomor_telepon);
                $("#txtContactPerson").val(data.contact_person);

                $("#lstPartnershipScheme").val(idPartnershipScheme).change();
                $('#lstProviderCategory').val(idProviderCategory).change();
            }
        });

        $('#modalTambahDataProvider').modal('show');        
    });
    
    
    $('.detailprovider').click(function(){
        const idProvider = $(this).data("id");
        console.log(idProvider);
        $('#txtid').html(idProvider);
        $('#modalInputLabelprovider').html('Provider');
        
        $('#modalDetailProvider').modal('show');        


        // send ajax request
        $.ajax({
            type: "GET",
            url: "/provider/" + idProvider,
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {   
                console.log(data);
                $("#providerid").html(data.id);
                $("#providernama").html(data.nama);
                $("#provideralamat").html(data.alamat);
                $("#providertelp").html(data.nomor_telepon);
                $("#providercp").html(data.contact_person);
                if (data.is_active == 1){
                    $("#providerstatus").html('Aktif');

                } else {
                    $("#providerstatus").html('Non-aktif');

                }
                if (data.id_partnership_scheme == 1){
                    $("#providerperjanjian").html('Perjanjian Kerjasama');

                } else {
                    $("#providerperjanjian").html('Kerjasama Tripartit');
                }

                if (data.id_provider_category == 1){
                    $("#providerkategori").html('Rumah Sakit');

                } else if (data.id_provider_category == 2){
                    $("#providerkategori").html('Klinik');
                } else {
                    $("#providerkategori").html('Lab/MCU');
                }



                // $('#txtdetailNama').val(data.nama);
                // $('#txtdetailAlamat').val(data.alamat);
                // $('#txtdetailNomorTelepon').val(data.nomor_telepon);
                // $("#txtdetailContactPerson").val(data.contact_person);

                // $("#lstPartnershipScheme").val(idPartnershipScheme).change();
                // $('#lstProviderCategory').val(idProviderCategory).change();
            }
        });

    });




    $('#btnNewProviderSubmit').click(function(){
        const idProvider = $('#frmDataProvider_id').val();
        console.log('Provider ID: ' + idProvider);

        const txtNama = $('#txtNama').val();
        const txtAlamat = $('#txtAlamat').val();
        const txtNomorTelepon = $('#txtNomorTelepon').val();
        const txtContactPerson = $('#txtContactPerson').val();
        const lstPartnershipScheme = $('#lstPartnershipScheme').val();
        const lstProviderCategory = $('#lstProviderCategory').val();

        if ($('#chkIsActive').is(':checked')){
            var chkIsActive = 1;
        } else {
            var chkIsActive = 0;
        }

        simpanDataProvider(
            idProvider,
            txtNama,
            txtAlamat,
            txtNomorTelepon,
            txtContactPerson,
            lstPartnershipScheme,
            lstProviderCategory,
            chkIsActive
        );
    });
});