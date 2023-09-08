/* modal cabang */

      $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
   

const baseUrl = $('meta[name="base-url"]').attr('content');

function simpanDataCabang(
    idBranch,
    txtNamaCabang,
    txtNamaPimpinan,
    idKelurahan,
    txtKodePos,
    txtAlamat,
    txtTelepon1,
    txtTelepon2,
    txtKontakPerson1,
    txtKontakPerson2,
    txtHP,
    txtAlamatTagihan
    ){

    const formData = new FormData($('form')[0]);

    formData.append('frmDataCabang_id', idBranch);    
    // formData.append('kode_asuransi', kode_asuransi);    
    formData.append('nama_cabang_asuransi', txtNamaCabang);
    formData.append('nama_pimpinan_cabang', txtNamaPimpinan);
    formData.append('id_dc_kelurahan', idKelurahan);
    formData.append('kodepos', txtKodePos);
    formData.append('alamat', txtAlamat);
    // formData.append('kecamatan', txtKecamatan);
    // formData.append('kota', txtKota);
    formData.append('telpon1', txtTelepon1);
    formData.append('telpon2', txtTelepon2);
    formData.append('kontakperson', txtKontakPerson1);
    formData.append('kontakperson2', txtKontakPerson2);
    formData.append('hp', txtHP);
    // formData.append('fax', txtFax);
    // formData.append('tgl_daftar', txtTglDaftar);
    // formData.append('tgl_nib', txtTglNIB);
    // formData.append('nomer_nib', txtNomNIB);
    // formData.append('jenis_asuransi', txtJenisAsuransi);
    // formData.append('kode_group', txtKodeGroup);
    formData.append('alamat_tagihan', txtAlamatTagihan);
    // formData.append('jenis_kerjasama', txtJenisKerjasama);
    // formData.append('logo_asuransi', logo_asuransi);

    $.ajax({
        type: "POST",
        url: "/cabang",
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
                target: '#modalTambahdataCabang'
            }).then(
                function (isConfirm) {
                  if (isConfirm) {
                    location.reload(true);
                  }
                },
                function() {
                }
            );
        }
    });
}


$(document).ready(function(){    

    $('.linkEdit').click(function(){
        const minCount = 2; // jumlah karakter minimal
        var keyupCount = 0;
        const idBranch = $(this).data("id");
        $('#modalInputLabel').html('Edit Data Cabang Asuransi');
        $('#frmDataCabang_action').val('update');
        $('#frmDataCabang_id').val(idBranch);
        $('#modalTambahdataCabang').modal('show');        

        // send ajax request
        $.ajax({
            type: "GET",
            url: "/cabang/" + idBranch,
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {
                $('#txtNamaCabang').val(data.nama_cabang_asuransi);
                $('#txtNamaPimpinan').val(data.nama_pimpinan_cabang);
                
                $('#txtidkelurahan').val(data.id_dc_kelurahan);

                $('#txtAlamat').val(data.alamat);
                $('#txtKodePos').val(data.kode_pos);
                
                $('#txtKelurahan').val(data.nama_kelurahan);
                $('#txtKecamatan').val(data.nama_kecamatan);
                $('#txtKota').val(data.nama_kota);

                $('#txtTelepon1').val(data.telpon1);
                $('#txtTelepon2').val(data.telpon2);
                $('#txtKontakPerson1').val(data.kontakperson);
                $('#txtKontakPerson2').val(data.kontakperson2);
                $('#txtHP').val(data.hp);
                // $('#txtFax').val(data.fax);
                
                // var date = data.tgl_daftar.split(" ");
                // var date1 = date[0];
                
                // $('#txtTglDaftar').val(date1);
                
                // var date = data.tgl_nib.split(" ");
                // var datenib1 = date[0];
                // $('#txtTglNIB').val(datenib1);
                // $('#txtNomNIB').val(data.nomer_nib);
                // $('#txtJenisAsuransi').val(data.jenis_asuransi);
                // $('#txtKodeGroup').val(data.kode_group);
                $('#txtAlamatTagihan').val(data.alamat_tagihan);
                // $('#txtJenisKerjasama').val(data.jenis_kerjasama);
                // $('#logo').prop('files')[0];
                
                // $.ajax({
                //     type: "GET",
                //     url: "/wilayah/kelurahan/" + data.id_dc_kelurahan,
                //     dataType: "json",
                //     beforeSend: function() {
                //         // todo:
                //     },
                //     success: function(data) { 
                //         console.log(data[0])
                //         //$('#txtKodePos').val(data[0].kode_pos);
                //         $('#txtKelurahan').val(data[0].nama);
                //         $('#txtKecamatan').val(data[0].nama_kecamatan);
                //         $('#txtKota').val(data[0].nama_kota);
                //     }
                // });
            }
        });
    });


    $('.linkDelete').click(function(){
        const idBranch = $(this).data("id");        
        bootbox.confirm({
            title: "Data Cabang",
            message: "Yakin hapus data cabang?",
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
                        url: "/cabang/delete",
                        data: { 
                            'id': idBranch
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


    $('#btnTambahDataCabang').click(function(){
        $('#modalInputLabel').html('Tambah Data Cabang');
        $('#frmDataCabang_action').val('add');
        $('#frmDataCabang_id').val(0);
        $('#modalTambahdataCabang').modal('show');
        $('#formcabangasuransi').trigger("reset");
    });

    const minCount = 2; // jumlah karakter minimal
    var keyupCount = 0;
    
    $("#txtKelurahan").keyup(function() {
        
        keyupCount++;
        if (keyupCount > minCount){
            $.ajax({
                type: "GET",
                url: "/wilayah/list/kelurahan/",
                data: 'keyword=' + $(this).val(),
                beforeSend: function() {
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 'OK'){
                        $('#kelurahan-list').html(data.content);
                        $('#kelurahan-list').show();
                    }
                }
            });
        }
    });


    $(document).on('click', '.list-item', function(event) {
        const dataId = $(this).attr('data-id');
        console.log(dataId);
        $('#txtKelurahanid').val(dataId);
        $('#kelurahan-list').hide();
        $.ajax({
            type: "GET",
            url: "/wilayah/kelurahan/" +dataId,
            beforeSend: function() {
            },
            success: function(data) { 
               
                const idKelurahan = dataId;
                // console.log(data[0]);
                $('#txtKelurahan').val(data[0].nama);
                $('#txtKodePos').val(data[0].kode_pos);
                $('#txtKecamatan').val(data[0].nama_kecamatan);
                $('#txtKota').val(data[0].nama_kota);
                $('#txtidkelurahan').val(idKelurahan);

                	
            }
        });
    });



    $('#btnNewBranchSubmit').click(function(){
        const idBranch = $('#frmDataCabang_id').val();

        const txtNamaCabang = $('#txtNamaCabang').val();
        const txtNamaPimpinan = $('#txtNamaPimpinan').val();
        // const kode_asuransi = $('#listasuransi').val();

        const idKelurahan = $('#txtidkelurahan').val();
        const txtAlamat = $('#txtAlamat').val();
        const txtKodePos = $('#txtKodePos').val();
        // const txtKota = $('#txtKota').val();
        const txtTelepon1 = $('#txtTelepon1').val();
        const txtTelepon2 = $('#txtTelepon2').val();
        const txtKontakPerson1 = $('#txtKontakPerson1').val();
        const txtKontakPerson2 = $('#txtKontakPerson2').val();
        const txtHP = $('#txtHP').val();
        // const txtFax = $('#txtFax').val();
        // const txtTglDaftar = $('#txtTglDaftar').val();
        // const txtTglNIB = $('#txtTglNIB').val();
        // const txtNomNIB = $('#txtNomNIB').val();
        // const txtJenisAsuransi = $('#txtJenisAsuransi').val();
        // const txtKodeGroup = $('#txtKodeGroup').val();
        const txtAlamatTagihan = $('#txtAlamatTagihan').val();
        // const txtJenisKerjasama = $('#txtJenisKerjasama').val();
        // const logo_asuransi = $('#logo').prop('files')[0];
        // console.log(kode_asuransi);
        // console.log('logo',logo);
        // console.log('pimpinan',txtNamaPimpinan);
        // console.log(txtAlamat);
        // console.log('kodepos',txtKodePos);
        // console.log(txtKota);
        // console.log(txtNamaPimpinan);

        simpanDataCabang(
            idBranch,
            txtNamaCabang,
            txtNamaPimpinan,
            idKelurahan,
            txtKodePos,
            txtAlamat,
            txtTelepon1,
            txtTelepon2,
            txtKontakPerson1,
            txtKontakPerson2,
            txtHP,
            txtAlamatTagihan
        );      
    });

    $('.detailcabang').click(function(){
        const idBranch = $(this).data("id");

        $('#txtid').html(idBranch);
        $('#modalInputLabelcabang').html('Cabang');
        $('#modalDetailCabang').modal('show');        

        // send ajax request
        $.ajax({
            type: "GET",
            url: "/cabang/detail/" + idBranch,
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) { 
                $('#modalDetailCabang_alamat_perusahaan_induk').html(data.alamat_perusahaan_induk);  
                
                console.log(data.alamat);

                $('#txtKodeAsuransi').html('Kode Asuransi : '+ data.kode_asuransi);
                $('#txtKepalaCabangdetail').html(': '+ data.kepala_cabang);

                $('#txtNamaCabangdetail').html(': '+ data.nama_cabang);
                $('#txtKodePosdetail').html(': '+ data.kode_pos);

                $('#txtNamaKelurahandetail').html(': '+ data.nama_kelurahan);
                $('#txtNamaKecamatandetail').html(': '+ data.nama_kecamatan);
                $('#txtNamaKotadetail').html(': '+ data.nama_kota);
                $('#txtAlamatdetail').html(': '+ data.alamat);
                $('#txtAlamatTagihanDetail').html(': ' + data.alamat_tagihan);

                $('#modalDetailCabang_nomorTelepon_1').html('1: ' + data.nomor_telepon_1);
                $('#modalDetailCabang_nomorTelepon_2').html('2: ' + data.nomor_telepon_2);

                $('#txtKontakPersondetail').html('1: ' + data.kontakperson);
                $('#txtKontakPerson2detail').html('2: ' + data.kontakperson2);
                
                $('#txtNomorHandphone').html(': ' + data.nomor_hp);
                $('#txtfaxdetail').html(': '+ data.fax);
                $('#txtnomer_nibdetail').html(': '+ data.nomer_nib);
                $('#txttgl_daftardetail').html(': '+ data.tgl_daftar);
                $('#txttgl_nibdetail').html(': '+ data.tgl_nib);
                $('#txtkode_groupdetail').html(': '+ data.kode_group);
                $('#txtjenis_asuransidetail').html(': '+ data.jenis_perusahaan);
                $('#txtjenis_kerjasamadetail').html(': '+ data.jenis_kerjasama);

                $('#modalDetailCabang_logoAsuransi').attr("src", data.logo_asuransi);
            }
        });

        // $.ajax({
        //     type: "GET",
        //     url: "/cabangprofile",
        //     beforeSend: function() {
        //         // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        //     },
        //     success: function(data) { 
        //         console.log(data);        

        //         $('#namaasuransi').html(data.nama_asuransi);

        //         $('#alamat').html(data.alamat);
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
    }); 
});