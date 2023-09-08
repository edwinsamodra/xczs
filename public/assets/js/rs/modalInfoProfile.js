$(document).ready(function(){
    $('#profileLogo').click(function(){
        var kodeKlinik = $(this).data('kode-klinik');

        // tampilkan modal profile

        // ajax request
        var url = '/ajax/rumahsakit/' + kodeKlinik;

        $.ajax({
            type: "GET",
            url: url,
            beforeSend: function(){
        
            },
            success: function(data){
                if (parseInt(data.error) === 0){
                    var content = data.content;
                    $('#modalDisplayProfile').modal('show');

                    let fields = dmcFunctions.getFields('mt_klinik');
                    $.each(fields, function(index, field){
                        let vField = eval("content." + field);
                        $('#displayProfile_' + field).html(vField);
                    });

                    $('#displayProfile_nama_kelurahan').html(content.nama_kelurahan);
                    $('#displayProfile_nama_kecamatan').html(content.nama_kecamatan);
                    $('#displayProfile_nama_kota').html(content.nama_kota);
                    $('#displayProfile_nama_propinsi').html(content.nama_propinsi);
                    $('#displayProfile_tgl_registrasi').html(dmcFunctions.formatDate(content.tgl_registrasi));
                    $('#displayProfile_tanggal_izin').html(dmcFunctions.formatDate(content.tanggal_izin));
                    $('#displayProfile_tanggal_akreditas').html(dmcFunctions.formatDate(content.tanggal_akreditas));

                    //     $('#displayProfile_nama_perusahaan').html(content.nama_perusahaan);
                    //     $('#displayProfile_nama_singkat').html(content.nama_singkat);
                    //     $('#displayProfile_nama_aplikasi').html(content.nama_aplikasi);
                    //     $('#displayProfile_alamat').html(content.alamat);

                    //     $('#displayProfile_kelurahan').html(content.nama_kelurahan);
                    //     $('#displayProfile_kecamatan').html(content.nama_kecamatan);
                    //     $('#displayProfile_kota').html(content.nama_kota);
                    //     $('#displayProfile_propinsi').html(content.nama_propinsi);
                    //     $('#displayProfile_kode_pos').html(content.kode_pos);

                    //     $('#displayProfile_pimpinan').html(nm);
                    //     $('#displayProfile_kontak_person').html(content.kontak_person);
                    //     $('#displayProfile_keterangan').html(content.keterangan);

                    //     $('#displayProfile_logo').html(content.logo);
                    //     $('#displayProfile_logo_small').html(content.logo_small);

                    //     $('#displayProfile_html_title').html(content.html_title);

                    //     $('#displayProfile_tgl_registrasi').html(content.tgl_registrasi);
                    //     $('#displayProfile_jenis_klinik').html(content.jenis_klinik);
                    //     $('#displayProfile_kelas_klinik').html(content.kelas_klinik);
                    //     $('#displayProfile_penyelenggara_klinik').html(content.penyelenggara_klinik);
                    //     $('#displayProfile_notelp_humas').html(content.notelp_humas);
                    //     $('#displayProfile_website').html(content.website);

                    //     $('#displayProfile_luas_tanah').html(content.luas_tanah);
                    //     $('#displayProfile_luas_bangunan').html(content.luas_bangunan);

                    //     $('#displayProfile_surat_izin').html(content.surat_izin);
                    //     $('#displayProfile_nomor_izin').html(content.nomor_izin);
                    //     $('#displayProfile_tanggal_izin').html(content.tanggal_izin);
                    //     $('#displayProfile_oleh_izin').html(content.oleh_izin);
                    //     $('#displayProfile_sifat_izin').html(content.sifat_izin);
                    //     $('#displayProfile_masa_berlaku').html(content.masa_berlaku);
                    //     $('#displayProfile_status_penyelenggara').html(content.status_penyelenggara);

                    //     $('#displayProfile_akreditas_rs').html(content.akreditas_rs);
                    //     $('#displayProfile_pentahapan_akreditas').html(content.pentahapan_akreditas);
                    //     $('#displayProfile_status_akreditas').html(content.status_akreditas);
                    //     $('#displayProfile_tanggal_akreditas').html(content.tanggal_akreditas);

                    //     $('#displayProfile_jumlah_tt').html(content.jumlah_tt);
                    //     $('#displayProfile_perinatologi').html(content.perinatologi);

                    //     $('#displayProfile_kelas_vvip').html(content.kelas_vvip);
                    //     $('#displayProfile_kelas_vip').html(content.kelas_vip);

                    //     $('#displayProfile_kelas_i').html(content.kelas_i);
                    //     $('#displayProfile_kelas_ii').html(content.kelas_ii);
                    //     $('#displayProfile_kelas_iii').html(content.kelas_iii);

                    //     $('#displayProfile_icu').html(content.icu);
                    //     $('#displayProfile_picu').html(content.picu);
                    //     $('#displayProfile_nicu').html(content.nicu);
                    //     $('#displayProfile_hcu').html(content.hcu);
                    //     $('#displayProfile_iccu').html(content.iccu);
                    //     $('#displayProfile_ruang_isolasi').html(content.ruang_isolasi);
                    //     $('#displayProfile_ruang_ugd').html(content.ruang_ugd);
                    //     $('#displayProfile_ruang_bersalin').html(content.ruang_bersalin);

                    //     $('#displayProfile_email').html(content.email);

                    //     $('#displayProfile_jenis_app').html(content.jenis_app);
                    //     $('#displayProfile_nomor_hp').html(content.nomor_hp);
                    //     $('#displayProfile_jenis_pklu').html(content.jenis_pklu);
                    //     $('#displayProfile_tgl_input').html(content.tgl_input);

                }                
            }
        });

        
    });
});