$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
 

const baseUrl = $('meta[name="base-url"]').attr('content');
function simpanDataMember(
    id,
    nama_peserta,
    no_ktp,
    kd_perusahaan,
    no_polis,
    kd_jabatan,
    nama_jabatan,
    tgl_lahir,
    id_dc_kawin,
    status,
    id_dc_gender,
    kd_kls_asuransi,
    id_dc_gol_darah,
    id_dc_agama,
    alergi,
    foto
) {
    const formData = new FormData($('form')[0]);

    formData.append('frmDialogTambahDataPeserta_id', id);
    formData.append('nama_peserta', nama_peserta);
    formData.append('no_ktp', no_ktp);
    formData.append('kd_perusahaan', kd_perusahaan);
    formData.append('no_polis', no_polis);
    formData.append('kd_jabatan', kd_jabatan);
    formData.append('nama_jabatan', nama_jabatan);
    formData.append('tgl_lahir', tgl_lahir);
    formData.append('id_dc_kawin', id_dc_kawin);
    formData.append('status', status);
    formData.append('id_dc_gender', id_dc_gender);
    formData.append('kd_kls_asuransi', kd_kls_asuransi);
    formData.append('id_dc_gol_darah', id_dc_gol_darah);
    formData.append('id_dc_agama', id_dc_agama);
    formData.append('alergi', alergi);
    formData.append('foto', foto);

    $.ajax({
        type: "POST",
        url: "/ajax/members",
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
                target: '#modalTambahDataMember'
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
    $('#btnTambahDataMember').click(function(){
        const nama = $(this).data("id");
        console.log('Anda mengklik tombol tambah data peserta');
        $('#modalInputLabel').html('Tambah Data Member');
        $('#frmDialogTambahDataPeserta_action').val('add');

        $('#frmDialogTambahDataPeserta_id').val(0);
        // $('#btnDialogTambahDataPeserta_submit').html('Tambah Data');
        $('#modalTambahDataMember').modal('show');
        $('#listperusahaa > option').each(function(i, option) {
            if ($(option).val() == nama) {
                $(option).attr('selected', 'selected');
            }
        });
    });


    $('.detail').click(function(){
        const id = $(this).data("id");
        console.log(id);

        $('#modalInputLabeldetail').html('Karyawan Perusahaan');
        $('#modalDetailPeserta').modal('show');

        // $('#frmDataPrivy_action').val('update');
        // $('#frmDataPrivy_id').val(id);
        // $('#btnNewPrivySubmit').html('Update Data');

        // send ajax request
        $.ajax({
            type: "GET",
            url: "/pendaftaranPeserta/" + id,
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {
                console.log(data);
                console.log(data.no_polis);

                
                $('#txtnama1').html(': ' +data.Nama_karyawan);
                $('#txtnama1Riwayat').html(': ' +data.Nama_karyawan);
                $('#txtno_polis').text(data.no_polis);
                $('#txtno_polisRiwayat').text(data.no_polis);
                $('#txtno_ktp').text(data.no_ktp);
                $('#txtno_ktpRiwayat').text(data.no_ktp);
                $('#txtnama').html(data.Nama_karyawan);
                $('#txtnamaRiwayat').html(data.Nama_karyawan);
                $('#txtno_polis2').text(': ' +data.no_polis);
                $('#txtno_polis2Riwayat').text(': ' +data.no_polis);
                $('#txtno_ktp').text(': ' +data.no_ktp);
                $('#txtno_ktpRiwayat').text(': ' +data.no_ktp);
                $('#txtnama_perusahaan').text(': ' +data.nama_perusahaan);
                $('#txtnama_perusahaanRiwayat').text(': ' +data.nama_perusahaan);
                $('#txtnama_jabatan').text(': ' +data.nama_jabatan);
                $('#txtnama_jabatanRiwayat').text(': ' +data.nama_jabatan);
                $('#txttgl_lahir').text(': ' +data.tgl_lahir);
                $('#txttgl_lahirRiwayat').text(': ' +data.tgl_lahir);
                $('#txtgender').text(': ' +data.gender);
                $('#txtgenderRiwayat').text(': ' +data.gender);
                $('#txtagama').text(': ' +data.agama);
                $('#txtagamaRiwayat').text(': ' +data.agama);
                $('#txtgolongandarah').text(': ' +data.golongan_darah);
                $('#txtgolongandarahRiwayat').text(': ' +data.golongan_darah);
                $('#txtnama_layanan').text(': ' +data.nama_layanan);
                $('#txtnama_layananRiwayat').text(': ' +data.nama_layanan);
                if (data.status == 'Perorangan'){
                    let pagu = data.pagu_perorangan;
                    $('#txtPagu').text(': ' +pagu.toLocaleString('id'));
                    $('#txtPaguRiwayat').text(': ' +pagu.toLocaleString('id'));
                } else {
                    let pagu = data.pagu_perorangan_keluarga;
                    $('#txtPagu').text(': ' +pagu.toLocaleString('id'));
                    $('#txtPaguRiwayat').text(': ' +pagu.toLocaleString('id'));
                }
                $('#imgDetailPesertaContainer').attr("src", '/' +data.foto);
                $('#imgDetailPesertaContainerRiwayat').attr("src", '/' +data.foto);

            }
        });

    });

    $('.keluarga').click(function(){
    
        const id = $(this).data("id");
        console.log(id);

        $('#modalkeluargaPeserta').modal('show');

        // send ajax request
        $.ajax({
            type: "GET",
            url: "/keluargapesertaperusahaan/" + id,
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {
                console.log(data.data[0].Nama_karyawan);
                const namakaryawan = data.data[0].Nama_karyawan;

                $('#namaMember_dlg').html(namakaryawan);
                console.log(namakaryawan);
                

                let memberRelatives = data.data;
                $('#tblMemberRelatives tbody').html("");
                                $.each(memberRelatives, function(idx, item){
                                    const ageDifMs = Date.now() - new Date(item.tgl_lahir).getTime();
                                    const ageDate = new Date(ageDifMs);
                                    const a = Math.abs(ageDate.getUTCFullYear() - 1970);
                                    
                                    $('#tblMemberRelatives tbody').append('<tr><td class="text-center">' + item.nama_keluarga_karyawan + '</td><td class="">' + 
                                        item.hubungan_keluarga + '</td><td>' + a + ' tahun </td><td>' + item.gender + '</td></tr>');
                                });

            }
        });

    });
    


    $('#btnSimpanDataPeserta').click(function(){
        const id = $('#frmDialogTambahDataPeserta_id').val();
        const nama_peserta = $('#nama_peserta').val();
        const no_ktp = $('#noktp').val();
        const kd_perusahaan = $('#listperusahaa').val();
        const no_polis = $('#nopolis').val();
        const kd_jabatan = $('#listjabatan').val();
        const nama_jabatan = $('#listjabatan').find('option:selected').text();
        const tgl_lahir = $('#txtTanggalLahir').val();
        const id_dc_kawin = $('#listkawin').val();
        const status = $('#liststatus').val();
        const id_dc_gender = $('#listgender').val();
        const kd_kls_asuransi = $('#listkelas').val();
        const id_dc_gol_darah = $('#listgoldarah').val();
        const id_dc_agama = $('#listagama').val();
        const alergi = $('#txtAlergi').val();
        const foto = $('#logo').prop('files')[0];


        // console.log('id'+id);
        // console.log('nama_peserta'+nama_peserta);
        // console.log('kd_perusahaan'+kd_perusahaan);
        // console.log('kd_jabatan'+kd_jabatan);
        // console.log('nama_jabatan'+nama_jabatan);
        // console.log('tgl_lahir'+tgl_lahir);
        // console.log('id_dc_kawin'+id_dc_kawin);
        // console.log('id_dc_gender'+id_dc_gender);
        // console.log('status'+status);
        // console.log('kd_kelas_asuransi'+kd_kls_asuransi);
        // console.log('id_dc_agama'+id_dc_agama);
        // console.log('id_dc_gol_darah'+id_dc_gol_darah);
        // console.log('alergi'+alergi);


        

        simpanDataMember(
            id,
            nama_peserta,
            no_ktp,
            kd_perusahaan,
            no_polis,
            kd_jabatan,
            nama_jabatan,
            tgl_lahir,
            id_dc_kawin,
            status,
            id_dc_gender,
            kd_kls_asuransi,
            id_dc_gol_darah,
            id_dc_agama,
            alergi,
            foto
            
        );
    });
    $('.linkEdit').click(function(){
        // const minCount = 2; // jumlah karakter minimal
        // var keyupCount = 0;
        const idKaryawan = $(this).data("id");
        // console.log(data[0]);

        $('#modalInputLabel').html('Edit Data Peserta');
        $('#frmDialogTambahDataPeserta_action').val('update');
        $('#frmDialogTambahDataPeserta_id').val(idKaryawan);
        $('#modalTambahDataMember').modal('show');        

        // send ajax request
        $.ajax({
            type: "GET",
            url: "/pendaftaranPeserta/" + idKaryawan,
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {   
                // console.log(data[0]);
                // var dateTime = new Date();
                // var date = dateTime.toLocaleDateString();
                // console.log(dateTime);
                $('#nama_peserta').val(data[0].Nama_Karyawan);
                $('#nopolis').val(data[0].Keterangan);
                // $('#jabatan').val(data[0].nama_jabatan);
                $('#txtTanggalLahir').val(data[0].tgl_lahir);
                const status = data[0].status;
                // console.log(data[0].tgl_lahir);
                // $('#txtStatusPerkawinan').val(data[0].kawin);
                // const id_dc_gender = data[0].id_dc_gender;
                // const jenis_kelamin = data[0].gender;
                const kd_perusahaan = data[0].kd_perusahaan;
                const kd_jabatan = data[0].kd_jabatan;
                // const id_dc_kawin = data[0].id_dc_kawin;
                const id_dc_gender = data[0].id_dc_gender;
                // const id_dc_agama = data[0].id_dc_agama;

                const id_dc_gol_darah = data[0].id_dc_gol_darah;
                // console.log(agama);
                $('#listperusahaa > option').each(function(i, option) {
                    if ($(option).val() == kd_perusahaan) {
                        $(option).attr('selected', 'selected');
                    }
                });
                $('#liststatus > option').each(function(i, option) {
                    if ($(option).val() == status) {
                        $(option).attr('selected', 'selected');
                    }
                });
                $('#listjabatan > option').each(function(i, option) {
                    if ($(option).val() == kd_jabatan) {
                        $(option).attr('selected', 'selected');
                    }
                });
             
                $('#listgender > option').each(function(i, option) {
                    if ($(option).val() == id_dc_gender) {
                        $(option).attr('selected', 'selected');
                    }
                });
                
                $('#listgoldarah > option').each(function(i, option) {
                    if ($(option).val() == id_dc_gol_darah) {
                        $(option).attr('selected', 'selected');
                    }
                });
                $('#txtAlergi').val(data[0].alergi);          
            }
        });
    });

    $('.linkDelete').click(function(){
        const idKaryawan = $(this).data("id");        
        bootbox.confirm({
            title: "Data Peserta",
            message: "Yakin hapus data peserta?",
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
                        url: "/pendaftaranPeserta/delete",
                        data: { 
                            'id': idKaryawan
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
    
    $('.detailriwayat').click(function(){
        $('#modaldetailRiwayat').modal('show');
        $('#modalDetailPeserta').modal('hide');
    });
    
});
