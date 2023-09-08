$(document).ready(function(){
    $('#logoAsuransi').click(function(){
        $.ajax({
            type: "GET",
            url: "/ajax/profile/current",
            beforeSend: function() {
                // put animated loading image here
            },
            success: function(data) {
                if (data.error === 0){
                    let profile = data.profile;
                    console.log(profile);

                    $('#displayProfile_kodeAsuransi').text(profile.kode_asuransi);
                    $('#displayProfile_namaAsuransi').text(profile.nama_asuransi);

                    $('#displayProfile_alamat').text(profile.alamat);
                    
                    $('#displayProfile_idkelurahan').text(profile.id_dc_kelurahan);
                    $('#displayProfile_kelurahan').text(profile.nama_kelurahan);

                    $('#displayProfile_idkota').text(profile.id_dc_kota);
                    $('#displayProfile_kota').text(profile.nama_kota);

                    $('#dislayProfile_idkecamatan').text(profile.id_dc_kecamatan);
                    $('#displayProfile_kecamatan').text(profile.nama_kecamatan);
                                       
                    $('#displayProfile_kodepos').text(profile.kodepos);
                    
                    $('#displayProfile_telepon1').text(profile.telpon1);
                    $('#displayProfile_telepon2').text(profile.telpon2);
                    
                    $('#displayProfile_kontakPerson1').text(profile.kontakperson);
                    $('#displayProfile_kontakPerson2').text(profile.kontakperson2);

                    // $('#').text(data.fax);

                    $('#displayProfile_tglDaftar').text(profile.tgl_daftar_full);
                    
                    $('#displayProfile_hp').text(profile.hp);

                    $('#displayProfile_noNIB').text(profile.nomer_nib);

                    $('#displayProfile_tglNIB').text(profile.tgl_NIB_full);

                    // $('#').text(profile.kode_group);

                    $('#displayProfile_alamatTagihan').text(profile.alamat_tagihan);
                    $('#displayProfile_jenisKerjasama').text(profile.jenis_kerjasama);
                    
                    // $('#').text(profile.jenis_perusahaan);

                    // $('#').text(profile.logo_asuransi); // todo
                    
                    $('#displayProfile_noSuratKontrak').text(profile.no_surat_kontrak);

                    $('#displayProfile_tglKontrak').text(profile.tgl_kontrak_full);
                    $('#displayProfile_tglExpired').text(profile.tgl_expired_full);

                    $('#displayProfile_namaPimpinan').text(profile.pimpinan);
                    
                    // $('#').text(profile.url_asuransi);

                    $.ajax({
                        type: "GET",
                        url: "/ajax/products",
                        beforeSend: function() {
                            // put animated loading image here
                        },
                        success: function(data) {
                            if (parseInt(data.error) === 0){
                                var products = data.products;
                                var rowNumber = 1;
                                $('#tblProdukAsuransi tbody').empty();
                                $.each(products, function( index, record ) {
                                    $('#tblProdukAsuransi tbody').append('<tr><td>' + rowNumber + '</td><td>' + record.nama_paket_asuransi + '</td></tr>');
                                    rowNumber++;
                                });
                            }
                        }
                    });                    

                    $('#modalDisplayProfile').modal('show');        
                }
            }
        });        
        
    });
});