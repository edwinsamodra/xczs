/* modal cabang */


// LISTBOX PROPINSI


function simpanDataCabangPerusahaan(
    idPerusahaan,
    txtNamaCabangPerusahaan,
    txtPimpinan,
    idKelurahan,
    txtKodePerusahaan,
    txtKodePos,
    txtAlamat,
    txtKota,
    txtTelepon1,
    txtTelepon2,
    txtKontakPerson1,
    txtKontakPerson2,
    txtHP,
    txtFax,
    txtTglDaftar,
    txtTglNIB,
    txtNomNIB,
    txtJenisPerusahaan,
    txtKodeGroup,
    txtAlamatTagihan,
    txtJenisKerjasama,
    logo
    ){

    const formData = new FormData($('form')[0]);

    formData.append('frmDataCabangPerusahaan_id', idPerusahaan);    
    formData.append('nama_cabang_perusahaan', txtNamaCabangPerusahaan);
    formData.append('kode_perusahaan', txtKodePerusahaan);
    formData.append('nama_pimpinan_cabang', txtPimpinan);
    formData.append('id_dc_kelurahan', idKelurahan);
    formData.append('kodepos', txtKodePos);
    formData.append('alamat', txtAlamat);
    formData.append('kota', txtKota);
    formData.append('telpon1', txtTelepon1);
    formData.append('telpon2', txtTelepon2);
    formData.append('kontakperson', txtKontakPerson1);
    formData.append('kontakperson2', txtKontakPerson2);
    formData.append('hp', txtHP);
    formData.append('fax', txtFax);
    formData.append('tgl_daftar', txtTglDaftar);
    formData.append('tgl_nib', txtTglNIB);
    formData.append('nomer_nib', txtNomNIB);
    formData.append('jenis_perusahaan', txtJenisPerusahaan);
    formData.append('kode_group', txtKodeGroup);
    formData.append('alamat_tagihan', txtAlamatTagihan);
    formData.append('jenis_kerjasama', txtJenisKerjasama);
    formData.append('logo', logo);
    
    $.ajax({
        type: "POST",
        url: "/cabangmitra",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function() {
            // todo:
        },
        success: function(data) { 
            console.log(data);
            // $('#modalTambahDataPerusahaan').modal('hide');
            Swal.fire({
                title: 'Info!',
                text: 'Data telah disimpan',
                icon: 'success',
                confirmButtonText: 'Tutup',
                target: '#modalTambahDataCabangPerusahaan'
            }).then(
                function (isConfirm) {
                  if (isConfirm) {
                    // console.log('CONFIRMED');
                    location.reload(true);
                  }
                },
                function() {
                //    console.log('BACK');
                }
            );
        }
    });
}

function simpanDataPaketPerusahaan(
    
    ){

    const formData = new FormData($('form')[0]);

    formData.append('frmDataCabangPerusahaan_id', idPerusahaan);    
    
    formData.append('paketAsuransi', paketAsuransi);
    
    $.ajax({
        type: "POST",
        url: "/cabangmitra",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function() {
            // todo:
        },
        success: function(data) { 
            console.log(data);
            // $('#modalTambahDataPerusahaan').modal('hide');
            Swal.fire({
                title: 'Info!',
                text: 'Data telah disimpan',
                icon: 'success',
                confirmButtonText: 'Tutup',
                target: '#modalTambahDataCabangPerusahaan'
            }).then(
                function (isConfirm) {
                  if (isConfirm) {
                    // console.log('CONFIRMED');
                    location.reload(true);
                  }
                },
                function() {
                //    console.log('BACK');
                }
            );
        }
    });
}

$(document).ready(function(){ 
    
    $('#btnTambahDataPaketAsuransiPerusahaan').click(function(){
        const idPerusahaanpaket = $(this).data("id");
        
        $('#frmDataPaketPerusahaan_id').val(idPerusahaanpaket);
        console.log(idPerusahaanpaket)

        
        $.ajax({
            type: "GET",
            url: "/ajax/products",
            beforeSend: function () {},
            success: function (data) {
                if (parseInt(data.error) == 0) {
                    let products = data.products;
                    $("#lstPaketAsuransi").empty();
                    $("#lstPaketAsuransi").append(
                        '<option value="0">Paket Asuransi</option>'
                    );
                    $.each(products, function (index, product) {
                        $("#lstPaketAsuransi").append(
                            '<option value="' +
                                product.kl_paket +
                                '">' +
                                product.nama_paket_asuransi +
                                "</option>"
                        );
                    });
                }
            },
        });

        $('#modalTambahDataPaketPerusahaan').modal('show');        
    });

    $("#btnTambahPaketPerusahaanmodal").click(function () {
        
        let paketAsuransi_value = $("#lstPaketAsuransi").find(":selected").val();
        var paketAsuransi_text = $("#lstPaketAsuransi").find(":selected").text();
        const tgl_kontrak_paket = $("#txtTglKontrakPaket").val();
        const no_kontrak_paket = $("#txtNoKontrakPaket").val();

        if (parseInt(paketAsuransi_value) > 0) {
            let numRows = $("#tblDaftarPaketPerusahaan tbody tr").length;
            let rowNumber = parseInt(numRows) + 1;

            // check similar
            let numSimilarId = $('#tblDaftarPaketPerusahaan tr[data-id="' + paketAsuransi_value + '"]').length;

            if (numSimilarId > 0) {
                Swal.fire({
                    title: "Info!",
                    text: "Paket yang sama sudah ada di daftar",
                    icon: "success",
                    confirmButtonText: "Tutup",
                    target: "#modalTambahDataPaketPerusahaan",
                });
            } else {
                let row = "<tr data-class='' data-rownum='" + rowNumber + "'><td data-class='paket-asuransi' data-id='" + paketAsuransi_value + "'>" + paketAsuransi_text + "</td><td data-class='nokontrak' data-id='" +  no_kontrak_paket + "'>" + no_kontrak_paket + "</td><td data-class='tglkontrak' data-id='" +  tgl_kontrak_paket + "'>" + tgl_kontrak_paket + "</td><td class=''><button type='button' data-row='" + rowNumber + "' class='btnDeletePaketPerusahaan btn btn-sm btn-info'><i class='fa fa-xmark' aria-hidden='true'></i> Hapus</button></td></tr>";
                $("#tblDaftarPaketPerusahaan tbody").append(row);
            }
        } else {
            Swal.fire({
                title: "Info!",
                text: "Anda belum memilih paket yang akan ditambahkan",
                icon: "success",
                confirmButtonText: "Tutup",
                target: "#modalTambahDataPaketPerusahaan",
            });
        }
    });

    $("#btnNewPaketSubmit").click(function () {

        const idPerusahaan = $("#frmDataPaketPerusahaan_id").val();
        const kodeasuransi = $("#txtKodeAsuransi").val();
        const kodeperusahaan = $("#txtKodePerusahaan").val();



        let listPaket = $('#tblDaftarPaketPerusahaan tbody td[data-class="paket-asuransi"]');
        let listnokontrak = $('#tblDaftarPaketPerusahaan tbody td[data-class="nokontrak"]');
        let listtglkontrak = $('#tblDaftarPaketPerusahaan tbody td[data-class="tglkontrak"]');
        console.log(listPaket);
        console.log(listnokontrak);
        console.log(listtglkontrak);

        let pilihanPaket = "";
        $.each(listPaket, function (index, paket) {
            pilihanPaket += $(paket).data("id") + ",";
        console.log(pilihanPaket);
            
        });
        let pilihannokontak = "";
        $.each(listnokontrak, function (index, nokontrakpaket) {
            pilihannokontak += $(nokontrakpaket).data("id") + ",";
        console.log(pilihannokontak);
            
        });
        let pilihantglkontrak = "";
        $.each(listnokontrak, function (index, tglkontrakpaket) {
            pilihantglkontrak += $(tglkontrakpaket).data("id") + ",";
        console.log(pilihantglkontrak);
            
        });

        let paketAsuransi = pilihanPaket.substring(0, pilihanPaket.length - 1);
        let paketNo_kontrak = pilihannokontak.substring(0, pilihannokontak.length - 1);
        let paketTgl_kontrak = pilihantglkontrak.substring(0, pilihantglkontrak.length - 1);
        console.log(paketAsuransi);
        console.log(paketNo_kontrak);
        console.log(kodeasuransi);

        
        simpanDataPaketPerusahaan(
            kodeasuransi,
            kodeperusahaan,
            paketAsuransi,
            paketNo_kontrak,
            paketTgl_kontrak,
        );  
        
    });

    $('.linkEditcabangmitra').click(function(){
        const minCount = 2; // jumlah karakter minimal
        var keyupCount = 0;
        const idPerusahaan = $(this).data("id");
        $('#modalInputLabelcabang').html('Edit Data Cabang Perusahaan');
        $('#frmDataCabangPerusahaan_action').val('update');
        $('#frmDataCabangPerusahaan_id').val(idPerusahaan);

        // send ajax request
        $.ajax({
            type: "GET",
            url: "/getcabangmitra/" + idPerusahaan,
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {       
                console.log(data)   
                $('#txtNamaCabangPerusahaan').val(data.nama_cabang_perusahaan);
                $('#txtPimpinan').val(data.nama_pimpinan_cabang);
                $('#listperusahaa > option').each(function(i, option) {
                    if ($(option).val() == data.kode_perusahaan) {
                        $(option).attr('selected', 'selected');
                    }
                });
                
                const idKelurahan = data.id_dc_kelurahan;
                $('#txtidkelurahan').val(idKelurahan);
                $('#txtAlamat').val(data.alamat);
                $('#txtKodePos').val(data.kode_pos);
                $('#txtKota').val(data.kota);
                $('#txtTelepon1').val(data.telpon1);
                $('#txtTelepon2').val(data.telpon2);
                $('#txtKontakPerson1').val(data.kontakperson);
                $('#txtKontakPerson2').val(data.kontakperson2);
                $('#txtHP').val(data.hp);
                $('#txtFax').val(data.fax);
                $('#txtKodePerusahaan').val(data.kode_perusahaan);

                var date = data.tgl_daftar.split(" ");
                var date1 = date[0];
                $('#txtTglDaftar').val(date1);
                var date = data.tgl_nib.split(" ");
                var datenib1 = date[0];
                $('#txtTglNIB').val(datenib1);
                $('#txtNomNIB').val(data.nomer_nib);
                $('#txtJenisPerusahan').val(data.jenis_perusahaan);
                $('#txtKodeGroup').val(data.kode_group);
                $('#txtAlamatTagihan').val(data.alamat_tagihan);
                $('#txtJenisKerjasama').val(data.jenis_kerjasama);
                $('#logo').prop('files')[0];

                

                // $('#lstPropinsi').empty();                
                $.ajax({
                    type: "GET",
                    url: "/wilayah/kelurahan/" +idKelurahan,
                    dataType: "json",
                    beforeSend: function() {
                        // todo:
                    },
                    success: function(data) { 
                        $('#txtKodePos').val(data[0].kode_pos);
                        $('#txtKelurahan').val(data[0].nama);
                    }
                });

                // $("#txtKelurahan").keyup(function() {
                //     keyupCount++;
                //     if (keyupCount > minCount){
                //         $.ajax({
                //             type: "GET",
                //             url: "/wilayah/list/kelurahan/",
                //             data: 'keyword=' + $(this).val(),
                //             beforeSend: function() {
                //             },
                //             success: function(data) {
                //                 console.log(data);
                //                 if (data.status == 'OK'){
                //                     $('#kelurahan-list').html(data.content);
                //                     $('#kelurahan-list').show();
                //                 }
                //             }
                //         });
                //     }
                // });

                // $(document).on('click', '.list-item', function(event) {
                //     const dataId = $(this).attr('data-id');
                //     $('#txtKelurahanid').val(dataId);
                //     $('#kelurahan-list').hide();
                //     $.ajax({
                //         type: "GET",
                //         url: "/wilayah/kelurahan/" +dataId,
                //         beforeSend: function() {
                //         },
                //         success: function(data) { 
                           
                //             const idKelurahan = dataId;
                            
                //             $('#txtKelurahan').val(data[0].nama);
                //             $('#txtKodePos').val(data[0].kode_pos);

                //             // $('#btnNewCabangMitraSubmit').click(function(){
                                
                //             //     const idPerusahaan = $('#frmDataCabangPerusahaan_id').val();
                        
                //             //     if ((idKelurahan != 0))
                //             //     {
                //             //         const txtNamaCabangPerusahaan = $('#txtNamaCabangPerusahaan').val();
                //             //         const txtPimpinan = $('#txtPimpinan').val();
                //             //         const txtKodePerusahaan = $('#listperusahaa').val();
                        
                //             //         simpanDataCabangPerusahaan(
                //             //             idPerusahaan,
                //             //             txtNamaCabangPerusahaan,
                //             //             txtPimpinan,
                //             //             idKelurahan,
                //             //             txtKodePerusahaan,
                //             //         );            
                //             //     }        
                //             // });	
                //         }
                //     });
                // });

                

                
            }
        });

        $('#modalTambahDataCabangPerusahaan').modal('show');        
    });

    $('.linkDeletecabangmitra').click(function(){
        const idPerusahaan = $(this).data("id");        
        console.log(idPerusahaan);

        bootbox.confirm({
            title: "Data Perusahaan",
            message: "Yakin hapus data perusahaan?",
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
                        url: "/cabangmitra/delete",
                        data: { 
                            'id': idPerusahaan
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

    $('#btnNewCabangMitraSubmit').click(function(){
        const idPerusahaan = $('#frmDataCabangPerusahaan_id').val();

        
            const txtNamaCabangPerusahaan = $('#txtNamaCabangPerusahaan').val();
            const txtPimpinan = $('#txtPimpinan').val();
            const txtKodePerusahaan = $('#listperusahaa').val();
            const idKelurahan = $('#txtidkelurahan').val();
            const txtAlamat = $('#txtAlamat').val();
            const txtKodePos = $('#txtKodePos').val();
            const txtKota = $('#txtKota').val();
            const txtTelepon1 = $('#txtTelepon1').val();
            const txtTelepon2 = $('#txtTelepon2').val();
            const txtKontakPerson1 = $('#txtKontakPerson1').val();
            const txtKontakPerson2 = $('#txtKontakPerson2').val();
            const txtHP = $('#txtHP').val();
            const txtFax = $('#txtFax').val();
            const txtTglDaftar = $('#txtTglDaftar').val();
            const txtTglNIB = $('#txtTglNIB').val();
            const txtNomNIB = $('#txtNomNIB').val();
            const txtJenisPerusahaan = $('#txtJenisPerusahan').val();
            const txtKodeGroup = $('#txtKodeGroup').val();
            const txtAlamatTagihan = $('#txtAlamatTagihan').val();
            const txtJenisKerjasama = $('#txtJenisKerjasama').val();
            const logo = $('#logo').prop('files')[0];
            
            simpanDataCabangPerusahaan(
                idPerusahaan,
                txtNamaCabangPerusahaan,
                txtPimpinan,
                idKelurahan,
                txtKodePerusahaan,
                txtKodePos,
                txtAlamat,
                txtKota,
                txtTelepon1,
                txtTelepon2,
                txtKontakPerson1,
                txtKontakPerson2,
                txtHP,
                txtFax,
                txtTglDaftar,
                txtTglNIB,
                txtNomNIB,
                txtJenisPerusahaan,
                txtKodeGroup,
                txtAlamatTagihan,
                txtJenisKerjasama,
                logo
            );            
             
    });	


    $('#btnTambahDataCabangPerusahaan').click(function(){
        
        const kdPerusahaan = $(this).attr('data-id');

        $('#modalInputLabelcabang').html('Tambah Data Cabang Perusahaan');
        $('#frmDataCabangPerusahaan_action').val('add');
        $('#frmDataCabangPerusahaan_id').val(0);
        $('#modalTambahDataCabangPerusahaan').modal('show');
        $('#formcabangperusahaan').trigger("reset");
        $('#txtKodePerusahaan').val(kdPerusahaan);


        // $('#listperusahaa > option').each(function(i, option) {
        //     if ($(option).val() == kdPerusahaan) {
        //         $(option).attr('selected', 'selected');
        //     }
        // });

        
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
        $('#txtKelurahanid').val(dataId);
        $('#kelurahan-list').hide();
        $.ajax({
            type: "GET",
            url: "/wilayah/kelurahan/" +dataId,
            beforeSend: function() {
            },
            success: function(data) { 
               
                const idKelurahan = dataId;
                
                $('#txtKelurahan').val(data[0].nama);
                $('#txtKodePos').val(data[0].kode_pos);
                $('#txtKecamatan').val(data[0].nama_kecamatan);
                $('#txtidkelurahan').val(idKelurahan);
                $('#txtKota').val(data[0].nama_kota);


                
            }
        });
    });

    // 

    // $('.detailmitra').click(function(){
    //     const idMitra = $(this).data("id");
    //     console.log(idMitra);    


    //     $('#txtid').html(idMitra);
    //     $('#modalInputLabelmitra').html('Mitra');
    //     $('#modalDetailMitra').modal('show');        


    //     // send ajax request
    //     $.ajax({
    //         type: "GET",
    //         url: "/mitrausaha/detail/" + idMitra,
    //         beforeSend: function() {
    //             // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
    //         },
    //         success: function(data) { 
    //             console.log(data);    
    //             $('#mitra').html(data.nama_perusahaan)
    //             console.log(data.nama_perusahaan);    

    //             $('#pusat').html(data.nama_cabang);
    //             $('#periode').html(data.periode);
    //             $('#alamat').html(data.alamat);
    //             $('#telp').html(data.nomor_telepon);
    //             $('#email').html(data.email);
    //             $("#direktur").html(data.nama_direktur);
    //             $("#pic").html(data.nama_contact_person);
    //             $("#telppic").html(data.telp_contact_person);
    //             $("#namaproduk").html(data.nama_produk);
    //         }
    //     });

    // });

    
});