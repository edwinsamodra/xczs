$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  
function simpanDataPrivy(
    id,
    txtNama,
    txtAlamat,
    txtTanggalLahir,
    txtNomorPolis,
    lstJenisKelamin,
    lstMembershipType
) {
    const formData = new FormData($('form')[0]);

    formData.append('frmDataPrivy_id', id);
    formData.append('nama', txtNama);
    formData.append('alamat', txtAlamat);
    formData.append('tanggal_lahir', txtTanggalLahir);
    formData.append('jenis_kelamin', lstJenisKelamin);
    formData.append('nomor_polis', txtNomorPolis);
    formData.append('membership_type', lstMembershipType);

    $.ajax({
        type: "POST",
        url: "/privy",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function() {
            // todo:
        },
        success: function(data) {
            Swal.fire({
                title: 'Info!',
                text: 'Data telah disimpan',
                icon: 'success',
                confirmButtonText: 'Tutup',
                target: '#modalTambahDataPrivy'
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


$('#lstJenisKelamin').on('change', function(){
    // console.log($(this).val());
});

$(document).ready(function(){
    $('#btnTambahDataPrivy').click(function(){
        $('#modalInputLabel').html('Tambah Data Member');
        $('#frmDataPrivy_action').val('add');
        $('#frmDataPrivy_id').val(0);
        $('#btnNewPrivySubmit').html('Tambah Data');
        $('#modalTambahDataPrivy').modal('show');
    });

    // $('#btnEditProvider').click(function(){
    //     const idProvider = $(this).data("id");
    //     $('#modalInputLabel').html('Edit Data Provider');
    //     $('#frmDataProvider_action').val('update');
    //     $('#frmDataProvider_id').val(idProvider);
    // });

    $('.btnDeletePrivy').click(function(){
        const id = $(this).data("id");
        // console.log(id);

        bootbox.confirm({
            title: "Data Member Privy",
            message: "Yakin hapus data member Privy?",
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
                        url: "/privy/delete",
                        data: {
                            'id': id
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


    $('.btnEditPrivy').click(function(){
        const id = $(this).data("id");
        $('#modalInputLabel').html('Edit Data Member Privy');
        $('#frmDataPrivy_action').val('update');
        $('#frmDataPrivy_id').val(id);
        $('#btnNewPrivySubmit').html('Update Data');

        // send ajax request
        $.ajax({
            type: "GET",
            url: "/privy/" + id,
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {
                // console.log(data);

                const jenisKelamin = data.jenis_kelamin;
                const membershipType = data.membership_type;
                const tanggalLahir = data.tanggal_lahir;

                console.log('Membership type: ' + membershipType);

                const arrJenisKelamin = [
                    'Laki-laki',
                    'Perempuan'
                ];

                // const arrMembershipType = [
                //     '-- Pilih Membership --',
                //     'Personal',
                //     'Corporate'
                // ];

                const arrMembershipType = {
                    1: 'Personal',
                    2: 'Corporate'
                };

                $('#dlgLstJenisKelamin').empty();
                $.each(arrJenisKelamin, function(idx, item){
                    if (idx == jenisKelamin){
                        $('#dlgLstJenisKelamin').append('<option value="' + idx + '" selected>' + item + '</option>');
                    } else {
                        $('#dlgLstJenisKelamin').append('<option value="' + idx + '">' + item + '</option>');
                    }
                });

                $('#dlgLstMembershipType').empty();
                $.each(arrMembershipType, function(idx, item){
                    if (idx == membershipType){
                        $('#dlgLstMembershipType').append('<option value="' + idx + '" selected>' + item + '</option>');
                    } else {
                        $('#dlgLstMembershipType').append('<option value="' + idx + '">' + item + '</option>');
                    }
                });


                $('#txtNama').val(data.nama);
                $('#txtAlamat').val(data.alamat);

                $('#txtTanggalLahir').val(tanggalLahir);
                $('#txtTanggalLahir_copy').val(dmcFormatDate(tanggalLahir));

                $("#txtNomorPolis").val(data.nomor_polis);
            }
        });

        $('#modalTambahDataPrivy').modal('show');
    });
    $('.detailprivy').click(function(){
        const idprivy = $(this).data("id");
        $('#privyid').html(idprivy);
        $('#modalInputLabelprivy').html('Privy');
        
        $('#modalDetailPrivy').modal('show');        


        // send ajax request
        $.ajax({
            type: "GET",
            url: "/privy/" + idprivy,
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {   
                console.log(data);
                $("#privyid").html(data.id);
                $("#privynama").html(data.nama);
                $("#privyalamat").html(data.alamat);
                $("#privypolis").html(data.nomor_polis);
                $("#privytgl_lahir").html(dmcFormatDate(data.tanggal_lahir));
                if (data.is_active == 0){
                    $("#privyjns_kelamin").html('Perempuan');

                } else {
                    $("#privyjns_kelamin").html('Laki-laki');

                }
                
            }
        });

    });



    $('#btnNewPrivySubmit').click(function(){
        const id = $('#frmDataPrivy_id').val();

        const txtNama = $('#txtNama').val();
        const txtAlamat = $('#txtAlamat').val();
        const txtTanggalLahir = $('#txtTanggalLahir').val();
        const txtNomorPolis = $('#txtNomorPolis').val();

        const lstJenisKelamin = $('#dlgLstJenisKelamin').val();
        const lstMembershipType = $('#dlgLstMembershipType').val();

        console.log('Privy ID: ' + id);
        console.log('Nama: ' + txtNama);
        console.log('Alamat: ' + txtAlamat);
        console.log('Tanggal Lahir: ' + txtTanggalLahir);
        console.log('Jenis Kelamin: ' + lstJenisKelamin);
        console.log('Membership Type: ' + lstMembershipType);

        simpanDataPrivy(
            id,
            txtNama,
            txtAlamat,
            txtTanggalLahir,
            txtNomorPolis,
            lstJenisKelamin,
            lstMembershipType
        );
    });
});
