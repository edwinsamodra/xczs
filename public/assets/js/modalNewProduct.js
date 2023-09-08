/* modal cabang */
$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const baseUrl = $('meta[name="base-url"]').attr('content');


function simpanDataProduk(
    idProduk,
    txtNamaProduk
    ){

    const formData = new FormData($('form')[0]);

    formData.append('frmDataProduk_id', idProduk);    
    formData.append('nama_produk', txtNamaProduk);

    $.ajax({
        type: "POST",
        url: "/produkasuransi",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function() {
            // todo:
        },
        success: function(data) { 
            console.log(data);
            // $('#modalTambahDataProduk').modal('hide');
            Swal.fire({
                title: 'Info!',
                text: 'Data telah disimpan',
                icon: 'success',
                confirmButtonText: 'Tutup',
                target: '#modalTambahDataProduk'
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

    $('.linkEdit').click(function(){
        const idProduk = $(this).data("id");
        $('#modalInputLabel').html('Edit Data Produk');
        $('#frmDataCabang_action').val('update');
        $('#frmDataCabang_id').val(idProduk);

        // send ajax request
        $.ajax({
            type: "GET",
            url: "/produkasuransi/" + idProduk,
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {          
                $('#txtNamaProduk').val(data.nama_produk);
            }
        });

        $('#modalTambahDataProduk').modal('show');        
    });

    $('.linkDelete').click(function(){
        const idProduk = $(this).data("id");        
        console.log(idProduk);

        bootbox.confirm({
            title: "Data Produk",
            message: "Yakin hapus data produk?",
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
                        url: "/produkasuransi/delete",
                        data: { 
                            'id': idProduk
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


    $('#btnTambahDataProduk').click(function(){
        $('#modalInputLabel').html('Tambah Data Produk');
        $('#frmDataProduk_action').val('add');
        $('#frmDataProduk_id').val(0);
        $('#modalTambahDataProduk').modal('show');
    });

    $('#btnNewProductSubmit').click(function(){
        const idProduk = $('#frmDataProduk_id').val();
        console.log('Product ID: ' + idProduk);

        const txtNamaProduk = $('#txtNamaProduk').val();

        simpanDataProduk(
            idProduk,
            txtNamaProduk
        );                 
    });	
});

function simpanDataTarif(
    id,
    txtBagian,
    txtTarif,
    txtKlinik,
    txtDokter
) {
    const formData = new FormData($('form')[0]);

    formData.append('frmDataTarif_id', id);
    formData.append('bagian', txtBagian);
    formData.append('tarif', txtTarif);
    formData.append('klinik', txtKlinik);
    formData.append('dokter', txtDokter);

    $.ajax({
        type: "POST",
        url: "/produkasuransi",
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
                target: '#modalTambahTarif'
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
    $('.btnTambahTarif').click(function(){
        $('#modalInputLabelTarif').html('Tambah Data Tarif');
        $('#frmDataTarif_action').val('add');
        $('#frmDataTarif_id').val(0);
        $('#btnNewTarifSubmit').html('Tambah Data');
        $('#modalTambahTarif').modal('show');
        $('#modaldetailProduk').modal('hide');

    });

    $('.btnDeleteTarif').click(function(){
        const id = $(this).data("id");
        // console.log(id);
        $('#modaldetailProduk').modal('hide');
    
        bootbox.confirm({
            title: "Data Member Tarif",
            message: "Yakin hapus data member Tarif?",
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
                        url: "/produkasuransi/deletetarif",
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
    
    
    $('.btnEditTarif').click(function(){
        const id = $(this).data("id");
        console.log(id);
        $('#modalInputLabelTarif').html('Edit Data Tarif');
        $('#frmDataTarif_action').val('update');
        $('#frmDataTarif_id').val(id);
        $('#btnNewTarifSubmit').html('Update Data');
    
        // send ajax request
        $.ajax({
            type: "GET",
            url: "/produkasuransi/" + id,
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {
    
    
                $("#txtBagian").val(data.bagian);
                console.log(data.bagian);
                $('#txtTarif').val(data.tarif);
                $("#txtKlinik").val(data.klinik);
                $("#txtDokter").val(data.dokter);
            }
        });
    
        $('#modalTambahTarif').modal('show');
        $('#modaldetailProduk').modal('hide');
        
    
    });
    $('.detailProduk').click(function(){
        const idProduct = $(this).data("id");

        $('#txtid').html(idProduct);
        $('#namaAsuransidetail').html('Paket');
        $('#modalDetailProduk').modal('show');        


        // // send ajax request
        // $.ajax({
        //     type: "GET",
        //     url: "/detail/paket/" + idProduct,
        //     beforeSend: function() {
        //         // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        //     },
        //     success: function(data) { 
        //         console.log(data);        

        //         $('#txtKepalaCabangdetail').html(': '+ data[0].kepala_cabang);

        //         $('#txtNamaCabangdetail').html(': '+ data[0].nama_cabang);
        //         $('#txtKodePosdetail').html(': '+ data[0].kode_pos);
        //         $('#txtNamaKelurahandetail').html(': '+ data[0].nama_kelurahan);
        //         $('#txtNamaKecamatandetail').html(': '+ data[0].nama_kecamatan);
        //         $('#txtNamaKotadetail').html(': '+ data[0].kota);
        //         $('#txtAlamatdetail').html(': '+ data[0].alamat);
        //         $('#txtAlamatdetail').html(': '+ data[0].alamat);
        //         $('#txtTelepon1detail').html(': '+ data[0].telpon1);
        //         $('#txtTelepon2detail').html(': '+ data[0].telpon2);
        //         $('#txtKontakPersondetail').html(': '+ data[0].kontakperson);
        //         $('#txtKontakPerson2detail').html(': '+ data[0].kontakperson2);
        //         $('#txthpdetail').html(': '+ data[0].hp);
        //         $('#txtfaxdetail').html(': '+ data[0].fax);
        //         $('#txtnomer_nibdetail').html(': '+ data[0].nomer_nib);
        //         $('#txttgl_daftardetail').html(': '+ data[0].tgl_daftar);
        //         $('#txttgl_nibdetail').html(': '+ data[0].tgl_nib);
        //         $('#txtkode_groupdetail').html(': '+ data[0].kode_group);
        //         $('#txtjenis_asuransidetail').html(': '+ data[0].jenis_asuransi);
        //         $('#txtalamat_tagihandetail').html(': '+ data[0].alamat_tagihan);
        //         $('#txtjenis_kerjasamadetail').html(': '+ data[0].jenis_kerjasama);
        //         $('#txtlogodetail').attr("src", data[0].logo);
                

        //     }
        // });
        $.ajax({
            type: "GET",
            url: "/detail/paket/" + idProduct,
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) { 
                console.log(data);        
                                                
                // $('#namaAsuransidetail').html(data[0].nama_asuransi);
                $('#namaAsuransi').html(data.nama_asuransi);
                // $('#logo').attr('src','logoasuransi/'.logo_asuransi);
                $('#paket').html(data.nama_paket_asuransi);
                // $('#sla').html(data.SLA);
                const respSLA = data.SLA;

                $.each(respSLA, function( index, slaData ) {
                    $('#listSLA').append('<a href="/detailklas/' + slaData.id + '" class="btn btn-sm btn-primary mx-2 p-2 text-white fw-bold mb-2 mt-2">' + slaData.name + '&nbsp;&nbsp;<i class="fa-solid fa-magnifying-glass"></i></a>');
                });
                

                // $('#alamat').html(data.alamat);
                // $('#txtKodePosdetail').html(': '+ data[0].kode_pos);
                // $('#txtNamaKelurahandetail').html(': '+ data[0].nama_kelurahan);
                // $('#txtNamaKecamatandetail').html(': '+ data[0].nama_kecamatan);
                // $('#txtNamaKotadetail').html(': '+ data[0].kota);
                // $('#txtAlamatdetail').html(': '+ data[0].alamat);
                // $('#txtAlamatdetail').html(': '+ data[0].alamat);
                // $('#txtTelepon1detail').html(': '+ data[0].telpon1);
                // $('#txtTelepon2detail').html(': '+ data[0].telpon2);
                // $('#txtKontakPersondetail').html(': '+ data[0].kontakperson);
                // $('#txtKontakPerson2detail').html(': '+ data[0].kontakperson2);
                // $('#txthpdetail').html(': '+ data[0].hp);
                // $('#txtfaxdetail').html(': '+ data[0].fax);
                // $('#txtnomer_nibdetail').html(': '+ data[0].nomer_nib);
                // $('#txttgl_daftardetail').html(': '+ data[0].tgl_daftar);
                // $('#txttgl_nibdetail').html(': '+ data[0].tgl_nib);
                // $('#txtkode_groupdetail').html(': '+ data[0].kode_group);
                // $('#txtjenis_asuransidetail').html(': '+ data[0].jenis_asuransi);
                // $('#txtalamat_tagihandetail').html(': '+ data[0].alamat_tagihan);
                // $('#txtjenis_kerjasamadetail').html(': '+ data[0].jenis_kerjasama);
                // $('#txtlogodetail').attr("src", data[0].logo);
                

            }
        });

    });

    $('#btnNewTarifSubmit').click(function(){
        const id = $('#frmDataTarif_id').val();

        const txtBagian = $('#txtBagian').val();
        const txtKlinik = $('#txtKlinik').val();
        const txtTarif = $('#txtTarif').val();
        const txtDokter = $('#txtDokter').val();


       

        simpanDataTarif(
            id,
            txtBagian,
            txtTarif,
            txtKlinik,
            txtDokter
        );
    });

});