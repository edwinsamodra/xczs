$(document).ready(function(){
    $('.sla-link').click(function(){
        let karyawanId = $(this).data("id");
        
        console.log('Karyawan ID: ' + karyawanId);

        $.ajax({
            type: "GET",
            url: "/ajax/members/" + karyawanId,
            beforeSend: function() {
                // todo: add animated spinner
            },
            success: function(data) { 

                if (data.status == 'Perorangan'){
                    var pagu = data.pagu_perorangan;
                } else {
                    var pagu = data.pagu_perorangan_keluarga;
                }

                $('#txtPagu').text('Rp ' + pagu.toLocaleString('id') + ',-');

                var terpakai = parseInt(pagu)/2;
                $('#txtTerpakai').text('Rp ' + terpakai.toLocaleString('id') + ',-');

                var saldo = parseInt(pagu) - parseInt(terpakai);
                $('#txtSaldo').text('Rp ' + saldo.toLocaleString('id') + ',-');

                $('#imgDetailPesertaContainer').attr("src", data.foto);

                $('#kd_Karyawan').text(data.kd_Karyawan);
                
                $('#txtNamaKaryawan').text(data.Nama_karyawan);
                $('#Nama_karyawan').text(data.Nama_karyawan);
                $('#txNama_karyawan').text(': ' + data.Nama_karyawan);

                $('#kd_jabatan').text(data.kd_jabatan);
                $('#tgl_lahir').text(dmcFunctions.formatDate(data.tgl_lahir));
                $('#txtgl_lahir').text(': ' + dmcFunctions.formatDate(data.tgl_lahir));
                $('#nama_jabatan').text(data.nama_jabatan);
                $('#alergi').text(data.alergi);

                $('#txtNomorPolis').text(data.no_polis);
                $('#no_polis').text(data.no_polis);
                $('#txno_polis').text(': ' + data.no_polis);
                
                
                $('#no_ktp').text(data.no_ktp);
                $('#txno_ktp').text(': ' + data.no_ktp);
                $('#status').text(data.status);
                $('#kawin').text(data.kawin);
                $('#id_dc_kawin').text(data.id_dc_kawin);
                $('#agama').text(data.agama);
                $('#tx_agama').text(': ' + data.agama);
                $('#id_dc_agama').text(data.id_dc_agama);
                // $('#id_dc_gender').text(data.id_dc_gender);
                $('#Keterangan').text(data.Keterangan);
                $('#foto').text(data.foto);
                $('#gender').text(data.gender);
                $('#txjenis_kelamin').text(': ' + data.gender);
                $('#golongan_darah').text(data.golongan_darah);
                $('#txgolongan_darah').text(': ' + data.golongan_darah);
                $('#id_dc_gol_darah').text(data.id_dc_gol_darah);
                $('#kd_perusahaan').text(data.kd_perusahaan);
                $('#nama_perusahaan').text(data.nama_perusahaan);
                $('#txnama_perusahaan').text(': ' + data.nama_perusahaan);
                $('#nama_layanan').text(data.nama_layanan);

                $('#modalDetailPeserta').modal('show');
            }
        });        
    });

    
    $('.detailRiwayat').click(function(){
        // let karyawanId = $(this).data("id");
        $('#modalDetailRiwayat').modal('show');
        $('#modalDetailPeserta').modal('hide');

        
        // console.log('Karyawan ID: ' + karyawanId);

        // $.ajax({
        //     type: "GET",
        //     url: "/ajax/members/" + karyawanId,
        //     beforeSend: function() {
        //         // todo: add animated spinner
        //     },
        //     success: function(data) { 
        //         console.log(data);
        //         console.log(data.Nama_karyawan);
        //         console.log(data.foto);
        //         console.log(data.status);

        //         if (data.status == 'Perorangan'){
        //             let pagu = data.pagu_perorangan;
        //             $('#txtPagu').text(pagu.toLocaleString('id'));
        //         } else {
        //             let pagu = data.pagu_perorangan_keluarga;
        //             $('#txtPagu').text(pagu.toLocaleString('id'));
        //         }

        //         $('#imgDetailPesertaContainer').attr("src", data.foto);

        //         $('#kd_Karyawan').text(data.kd_Karyawan);
                
        //         $('#txtNamaKaryawan').text(data.Nama_karyawan);
        //         $('#Nama_karyawan').text(data.Nama_karyawan);

        //         $('#kd_jabatan').text(data.kd_jabatan);
        //         $('#tgl_lahir').text(data.tgl_lahir);
        //         $('#nama_jabatan').text(data.nama_jabatan);
        //         $('#alergi').text(data.alergi);

        //         $('#txtNomorPolis').text(data.no_polis);
        //         $('#no_polis').text(data.no_polis);
                
        //         $('#no_ktp').text(data.no_ktp);
        //         $('#status').text(data.status);
        //         $('#kawin').text(data.kawin);
        //         $('#id_dc_kawin').text(data.id_dc_kawin);
        //         $('#agama').text(data.agama);
        //         $('#id_dc_agama').text(data.id_dc_agama);
        //         // $('#id_dc_gender').text(data.id_dc_gender);
        //         $('#Keterangan').text(data.Keterangan);
        //         $('#foto').text(data.foto);
        //         $('#gender').text(data.gender);
        //         $('#golongan_darah').text(data.golongan_darah);
        //         $('#id_dc_gol_darah').text(data.id_dc_gol_darah);
        //         $('#kd_perusahaan').text(data.kd_perusahaan);
        //         $('#nama_perusahaan').text(data.nama_perusahaan);
        //         $('#nama_layanan').text(data.nama_layanan);

        //     }
        // });        
    });
});