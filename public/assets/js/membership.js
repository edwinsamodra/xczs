$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
const baseUrl = $('meta[name="base-url"]').attr('content');

$(document).ready(function(){
    $('.keluarga').click(function(){
    
        const idPeserta = $(this).data("id");
        console.log("ID Peserta: " + idPeserta);
        $('#btnTambahDataKeluarga').data("peserta-id", idPeserta);

        $.ajax({
            type: "GET",
            url: "/ajax/members/" + idPeserta,
            beforeSend: function(){
                // show loader here
            },
            success: function(data){
                const genderId = data.id_dc_gender; // 1=lk 2=pr
                const marriageStatusId = data.id_dc_kawin; // 1=perorangan 2,3,4=berkeluarga

                console.log('Marriage Status ID: ' + marriageStatusId);

                $('#btnTambahDataKeluarga').data("gender-id", genderId);
                $('#btnTambahDataKeluarga').data("marriage-status-id", marriageStatusId);

            }
        });

        $('#modalkeluargaPeserta').modal('show');

        // send ajax request
        $.ajax({
            type: "GET",
            url: "/keluargapesertaperusahaan/" + idPeserta,
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {
                // console.log(data.data[0].Nama_karyawan);
                const namakaryawan = data.data[0].Nama_karyawan;

                $('#namaMember_dlg').html(namakaryawan);
                // console.log(namakaryawan);
                
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
    


    $('#btnTambahDataKeluarga').click(function(){        
        // console.log('Tambah Keluarga - Opened');

        $('#modalkeluargaPeserta').modal('hide');

        const pesertaId = $(this).data("peserta-id");
        const genderId = $(this).data("gender-id");
        const marriageStatusId = $(this).data("marriage-status-id");

        console.log("Peserta ID (btnTambahDataKeluarga): " + pesertaId);

        // const memberId = $(this).data('id');
        $('#frmTambahDataKeluarga_member_id').val(0);
        // $('#frmTambahDataKeluarga_member_action').val(add);
        $('#modalTambahDataKeluarga').modal('show');

        // get family relationships
        if (parseInt(genderId) === 2 && (parseInt(marriageStatusId) === 2 || parseInt(marriageStatusId) === 4)){            
            excludedItems = '1,2';
            console.log('Excluded Items: ' + excludedItems);
        } else {
            console.log('Gender ID: ' + genderId + ' | ' + 'marriageStatusId: ' + marriageStatusId);
            excludedItems = '';
        }

        console.log('Gender ID: ' + genderId + ' | marriageStatusId: ' + marriageStatusId);

        const payload = { 
            excludedItems: excludedItems
        };

        $.ajax({
            type: "GET",
            url: "/ajax/family-relationships",
            data: payload,
            beforeSend: function() {
                // todo:
            },
            success: function(data) { 
                console.log(data);
                if (parseInt(data.error) == 0)
                {
                    $('#lstHubunganKeluarga').empty();
                    const familyRelationships = data.family_relationships;
                    $.each(familyRelationships, function(idx, item){
                        var option = '<option value="' + item.id_dc_stat_keluarga + '">' + item.hubungan_keluarga + '</option>';                        
                        $('#lstHubunganKeluarga').append(option);
                    });
                } else {

                }
                
            }
        });        

    });

    $('#btnTambahKeluargaSubmit').click(function(){
        const id = $('#frmTambahDataKeluarga_member_id').val();

        const nama_keluarga    = $('#nama_keluarga').val();
        const id_dc_stat_keluarga    = $('#listhubungankeluarga').val();
        const kd_Karyawan        = $('#listkaryawanperusahaan').val();
        const tgl_lahir  = $('#tanggal_lahir').val();
        const id_dc_gender = $('#listgender').val();
        const id_dc_agama = $('#listagama').val();
        const id_dc_gol_darah = $('#listgoldarah').val();
        const alergi = $('#txtAlergi').val();




        $.ajax({
            type: "POST",
            url: "/ajax/member-relatives/create",
            data: { 
                'id' : id,
                'nama_keluarga': nama_keluarga,
                'id_dc_stat_keluarga': id_dc_stat_keluarga,
                'kd_Karyawan': kd_Karyawan,
                'tgl_lahir': tgl_lahir,
                'id_dc_gender': id_dc_gender,
                'id_dc_agama': id_dc_agama,
                'id_dc_gol_darah': id_dc_gol_darah,
                'alergi': alergi
            },
            beforeSend: function() {
                // todo:
            },
            success: function(data) { 
                if (parseInt(data.error) == 0)
                {
                    Swal.fire({
                        title: 'Info!',
                        text: 'Data telah disimpan',
                        icon: 'success',
                        confirmButtonText: 'Tutup',
                        target: '#modalTambahDataKeluarga'
                    });
                } else {
                    Swal.fire({
                        title: 'Info!',
                        text: 'Data gagal disimpan',
                        icon: 'error',
                        confirmButtonText: 'Tutup',
                        target: '#modalTambahDataKeluarga'
                    });
                }
            }
        });        
    });
});