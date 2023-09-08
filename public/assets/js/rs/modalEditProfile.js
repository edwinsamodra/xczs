// convert yyyy-mm-dd to mm-dd-yy
function convertDate(str="")
{
    if (str != ""){
        let arr     = str.split("-");
        let tahun   = arr[0];
        let bulan   = arr[1];
        let tanggal = arr[2];
        var hasil = bulan + "/" + tanggal + "/" + tahun;    
    } else {
        var hasil = "";
    }

    return hasil;
}

$(document).ready(function(){
    // const editProfileButton = '<a style="text-shadow:none;font-size:0.8rem;padding:3px;font-weight:bold;" href="#"><i class="fa-solid fa-pen-to-square"></i> <span style="color:#62B3FF;">Edit</span></a>';
    // $('#editProfileButtonContainer').html(editProfileButton);

    // var quill = new Quill('#inpEditProfile_namaAsuransi', {
    //     theme: 'snow'
    // });

    $.ajaxSetup({
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        }
    });    

    $('#modalEditProfileLoader').click(function(){

        var kodeKlinik = $(this).data('kode-klinik');

        $.ajax({
            type: "GET",
            url: "/ajax/rumahsakit/" + kodeKlinik,
            beforeSend: function() {
                // put animated loading image here
            },
            success: function(data) {
                if (data.error === 0){
                    let profile = data.content;

                    // todo: shorten assignment using loop
                    // let fields = dmcFunctions.getFields('mt_klinik');
                    
                    $('#inpEditProfile_id_mt_klinik').val(profile.id_mt_klinik);
                    $('#inpEditProfile_kode_klinik').val(profile.kode_klinik);
                    
                    $('#inpEditProfile_nama_perusahaan').val(profile.nama_perusahaan);
                    $('#inpEditProfile_nama_singkat').val(profile.nama_singkat);
                    $('#inpEditProfile_nama_pimpinan').val(profile.nama_pimpinan);

                    $('#inpEditProfile_nama_aplikasi').val(profile.nama_aplikasi);
                    $('#inpEditProfile_jenis_app').val(profile.jenis_app);

                    $('#inpEditProfile_alamat').val(profile.alamat);

                    $('#inpEditProfile_id_dc_kelurahan').val(profile.id_dc_kelurahan);
                    $('#inpEditProfile_kelurahan').val(profile.nama_kelurahan);                    

                    $('#inpEditProfile_id_dc_kecamatan').val(profile.id_dc_kecamatan);
                    $('#inpEditProfile_kecamatan').val(profile.nama_kecamatan);

                    $('#inpEditProfile_id_dc_kota').val(profile.id_dc_kota);
                    $('#inpEditProfile_kota').val(profile.nama_kota);

                    $('#inpEditProfile_id_dc_propinsi').val(profile.id_dc_propinsi);
                    $('#inpEditProfile_propinsi').val(profile.nama_propinsi);

                    $('#inpEditProfile_kode_pos').val(profile.kode_pos);

                    $('#inpEditProfile_kontak_person').val(profile.kontak_person);
                    $('#inpEditProfile_nomer_hp').val(profile.nomer_hp);
                    $('#inpEditProfile_telpon').val(profile.telpon);                    
                    $('#inpEditProfile_fax').val(profile.fax);
                    $('#inpEditProfile_notelp_humas').val(profile.notelp_humas);
                    $('#inpEditProfile_website').val(profile.website);
                    $('#inpEditProfile_email').val(profile.email);

                    $('#inpEditProfile_logo_small').val(profile.logo_small);

                    $('#inpEditProfile_tgl_registrasi').val(profile.tgl_registrasi);
                    $('#inpEditProfile_jenis_klinik').val(profile.jenis_klinik);
                    $('#inpEditProfile_kelas_klinik').val(profile.kelas_klinik);
                    $('#inpEditProfile_penyelenggara_klinik').val(profile.penyelenggara_klinik);
                    
                    $('#inpEditProfile_luas_tanah').val(profile.luas_tanah);
                    $('#inpEditProfile_luas_bangunan').val(profile.luas_bangunan);
                    $('#inpEditProfile_surat_izin').val(profile.surat_izin);
                    $('#inpEditProfile_nomor_izin').val(profile.nomor_izin);
                    $('#inpEditProfile_tanggal_izin').val(profile.tanggal_izin);
                    $('#inpEditProfile_oleh_izin').val(profile.oleh_izin);
                    $('#inpEditProfile_sifat_izin').val(profile.sifat_izin);
                    $('#inpEditProfile_masa_berlaku').val(profile.masa_berlaku);
                    $('#inpEditProfile_status_penyelenggara').val(profile.status_penyelenggara);

                    $('#inpEditProfile_akreditas_rs').val(profile.akreditas_rs);
                    $('#inpEditProfile_pentahapan_akreditas').val(profile.pentahapan_akreditas);
                    $('#inpEditProfile_status_akreditas').val(profile.status_akreditas);
                    $('#inpEditProfile_tanggal_akreditas').val(profile.tanggal_akreditas);

                    $('#inpEditProfile_jumlah_tt').val(profile.jumlah_tt);
                    $('#inpEditProfile_perinatologi').val(profile.perinatologi);
                    $('#inpEditProfile_kelas_vvip').val(profile.kelas_vvip);
                    $('#inpEditProfile_kelas_vip').val(profile.kelas_vip);
                    $('#inpEditProfile_kelas_i').val(profile.kelas_i);
                    $('#inpEditProfile_kelas_ii').val(profile.kelas_ii);
                    $('#inpEditProfile_kelas_iii').val(profile.kelas_iii);

                    $('#inpEditProfile_icu').val(profile.icu);
                    $('#inpEditProfile_picu').val(profile.picu);
                    $('#inpEditProfile_nicu').val(profile.nicu);
                    $('#inpEditProfile_hcu').val(profile.hcu);
                    $('#inpEditProfile_iccu').val(profile.iccu);
                    $('#inpEditProfile_ruang_isolasi').val(profile.ruang_isolasi);
                    $('#inpEditProfile_ruang_ugd').val(profile.ruang_ugd);
                    $('#inpEditProfile_ruang_bersalin').val(profile.ruang_bersalin);
                    
                    $('#inpEditProfile_jenis_pklu').val(profile.jenis_pklu);
                    $('#inpEditProfile_keterangan').val(profile.keterangan);
                    $('#inpEditProfile_tgl_input').val(profile.tgl_input);

                    $('#modalEditProfile').modal('show');
                }
            }
        });
    });

    const minCount = 2; // jumlah karakter minimal
    var keyupCount = 0;

    $("#inpEditProfile_kelurahan").keyup(function() {        
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
                $('#inpEditProfile_kelurahan').val(data[0].nama);
                $('#inpEditProfile_id_dc_kelurahan').val(idKelurahan);

                $('#inpEditProfile_kecamatan').val(data[0].nama_kecamatan);
                $('#inpEditProfile_id_dc_kecamatan').val(data[0].id_dc_kecamatan);

                $('#inpEditProfile_kota').val(data[0].nama_kota);
                $('#inpEditProfile_id_dc_kota').val(data[0].id_dc_kota);

                $('#inpEditProfile_propinsi').val(data[0].nama_propinsi);
                $('#inpEditProfile_id_dc_propinsi').val(data[0].id_dc_propinsi);

                $('#inpEditProfile_kodepos').val(data[0].kode_pos);
            }
        });
    });


    $('#btnEditProfile_save').click(function(){
        let arrFields = [
            'id_mt_klinik',
            'kode_klinik',
            'nama_perusahaan',
            'nama_singkat',
            'nama_aplikasi',
            'alamat',
            'kota',
            'propinsi',
            'kode_pos',
            'telpon',
            'fax',
            'nama_pimpinan',
            'kontak_person',
            'keterangan',
            'logo',
            'logo_small',
            'html_title',
            'tgl_registrasi',
            'jenis_klinik',
            'kelas_klinik',
            'penyelenggara_klinik',
            'notelp_humas',
            'website',
            'luas_tanah',
            'luas_bangunan',
            'surat_izin',
            'nomor_izin',
            'tanggal_izin',
            'oleh_izin',
            'sifat_izin',
            'masa_berlaku',
            'status_penyelenggara',
            'akreditas_rs',
            'pentahapan_akreditas',
            'status_akreditas',
            'tanggal_akreditas',
            'jumlah_tt',
            'perinatologi',
            'kelas_vvip',
            'kelas_vip',
            'kelas_i',
            'kelas_ii',
            'kelas_iii',
            'icu',
            'picu',
            'nicu',
            'hcu',
            'iccu',
            'ruang_isolasi',
            'ruang_ugd',
            'ruang_bersalin',
            'email',
            'id_dc_kelurahan',
            'id_dc_kecamatan',
            'id_dc_kota',
            'id_dc_negara',
            'id_dc_propinsi',
            'id_dd_paket',
            'jenis_app',
            'nomer_hp',
            'jenis_pklu',
            'tgl_input',            
        ];

        let arrContent = [];
        $.each(arrFields, function(key, field){
            arrContent[field] = $('#inpEditProfile_' + field).val();
        });

        // todo: get id_dc_propinsi & id_dc_negara
        // arrContent['id_dc_propinsi'] = kelurahan.id_dc_propinsi;
        // arrContent['id_dc_negara'] = kelurahan.id_dc_negara;

        // let kodeKlinik      = $('#inpEditProfile_kodeKlinik').val();
        // let namaPerusahaan  = $('#inpEditProfile_namaPerusahaan').val();
        // let namaSingkat     = $('#inpEditProfile_namaSingkat').val();
        // let namaPimpinan    = $('#inpEditProfile_namaPimpinan').val();
        // let alamat          = $('#inpEditProfile_alamat').val();

        // let namaAplikasi    = $('#inpEditProfile_namaAplikasi').val();
        // let jenisApp        = $('#inpEditProfile_jenisApp');
        
        // let idkelurahan      = $('#inpEditProfile_idkelurahan').val();
        // let idkecamatan      = $('#inpEditProfile_idkecamatan').val();        
        // let idkota           = $('#inpEditProfile_idkota').val();
                
        // let kodePos         = $('#inpEditProfile_kodePos').val();
        
        // let kontakPerson    = $('#inpEditProfile_kontakPerson').val();
        // let nomerHP         = $('#inpEditProfile_nomerHP').val();
        // let telpon          = $('#inpEditProfile_telpon').val();
        // let fax             = $('#inpEditProfile_fax').val();
        // let notelpHumas     = $('#inpEditProfile_notelpHumas').val();
        // let website         = $('#inpEditProfile_website').val();
        // let email           = $('#inpEditProfile_email').val();

        // let logoSmall             = $('#inpEditProfile_logoSmall').val();
        // let tglRegistrasi             = $('#inpEditProfile_tglRegistrasi').val();
        // let jenisKlinikk             = $('#inpEditProfile_jenisKlinik').val();
        // let kelasKlinik             = $('#inpEditProfile_kelasKlinik').val();
        // let penyelenggaraKlinik             = $('#inpEditProfile_penyelenggaraKlinik').val();
        // let luasTanah             = $('#inpEditProfile_luasTanah').val();
        // let luasBangunan             = $('#inpEditProfile_luasBangunan').val();
        // let suratIzin             = $('#inpEditProfile_suratIzin').val();
        // let nomorIzin             = $('#inpEditProfile_nomorIzin').val();
        // let tanggalIzin             = $('#inpEditProfile_tanggalIzin').val();
        // let olehIzin             = $('#inpEditProfile_olehIzin').val();
        // let sifatIzin             = $('#inpEditProfile_sifatIzin').val();
        // let masaBerlaku             = $('#inpEditProfile_masaBerlaku').val();
        // let statusPenyelenggara             = $('#inpEditProfile_statusPenyelenggara').val();
        // let akreditasRS             = $('#inpEditProfile_akreditasRS').val();

        // let pentahapanAkreditas             = $('#inpEditProfile_pentahapanAkreditas').val();').val();
        // let statusAkreditas             = $('#inpEditProfile_statusAkreditas').val();
        // let tanggalAkreditas             = $('#inpEditProfile_tanggalAkreditas').val();

        // let jumlahTT             = $('#inpEditProfile_jumlahTT').val();
        // let perinatologi             = $('#inpEditProfile_perinatologi').val();
        // let kelasVVIP             = $('#inpEditProfile_kelasVVIP').val();
        // let kelasVIP             = $('#inpEditProfile_kelasVIP').val();
        // let kelasI             = $('#inpEditProfile_kelasI').val();
        // let kelasII             = $('#inpEditProfile_kelasII').val();
        // let kelasIII             = $('#inpEditProfile_kelasIII').val();

        // let icu             = $('#inpEditProfile_icu').val();
        // let picu             = $('#inpEditProfile_picu').val();
        // let nicu             = $('#inpEditProfile_nicu').val();
        // let hcu             = $('#inpEditProfile_hcu').val();
        // let iccu             = $('#inpEditProfile_iccu').val();
        // let ruangIsolasi             = $('#inpEditProfile_ruangIsolasi').val();
        // let ruangUGD             = $('#inpEditProfile_ruangUGD').val();
        // let ruangBersalin             = $('#inpEditProfile_ruangBersalin').val();
        // let jenisPKLU             = $('#inpEditProfile_jenisPKLU').val();
        // let keterangan             = $('#inpEditProfile_keterangan').val();
        
        let formData = new FormData($('form')[0]);

        $.each(arrFields, function(key, field){
            formData.append(field, arrContent[field]);
        });

        formData.append('logo_small', '');

        // formData.append('kode_asuransi', kodeAsuransi);
        // formData.append('nama_asuransi', namaAsuransi);    
        // formData.append('pimpinan', namaPimpinan);    
        // formData.append('alamat', alamat);

        // formData.append('id_dc_kelurahan', idkelurahan);
        // formData.append('id_dc_kecamatan', idkecamatan);
        // formData.append('id_dc_kota', idkota);
        
        // formData.append('kota', kota);

        // formData.append('kode_pos', kode_pos);
        // formData.append('telpon1', telpon1);
        // formData.append('telpon2', telpon2);
        // formData.append('kontakPerson', kontakPerson);
        // formData.append('kontakPerson2', kontakPerson2);
        // formData.append('hp', hp);
        // formData.append('tgl_daftar', tgl_daftar);
        // formData.append('tgl_nib', tgl_nib);
        // formData.append('alamat_tagihan', alamat_tagihan);
        // formData.append('jenis_kerjasama', jenis_kerjasama);

        // old upload file
        // var filenames = $('#inpEditProfile_logo')[0].files;

        // if (filenames.length > 0){
        //     let logo = $('#inpEditProfile_logo').prop('files')[0];
        //     formData.append('logo', logo);
        // }        

        const toBase64 = file => new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = error => reject(error);
        });
        
        async function Main() {
            var filenames = $('#inpEditProfile_logo')[0].files;
            if (filenames.length > 0) {
                const logo = $('#inpEditProfile_logo').prop('files')[0];
                formData.append('logo', await toBase64(logo));

                // while promises solved then post data
                $.ajax({
                    type: "POST",
                    url: "/rumahsakit",
                    data: formData,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function() {
                        // todo:
                    },
                    success: function(data) { 
                        if (parseInt(data.error) === 0){
                            Swal.fire({
                                title: 'Info!',
                                text: 'Data telah disimpan',
                                icon: 'success',
                                confirmButtonText: 'Tutup',
                                target: '#modalEditProfile'
                            }).then(
                                function (isConfirm) {
                                    if (isConfirm) {
                                        // console.log('CONFIRMED');
                                        location.reload(true);
                                    }
                                },
                                function() {
                                    // console.log('BACK');
                                }
                            );
            
                        } else {
                            Swal.fire({
                                title: 'Info!',
                                text: 'Data gagal diupdate',
                                icon: 'error',
                                confirmButtonText: 'Tutup',
                                target: '#modalEditProfile'
                            }).then(
                                function (isConfirm) {
                                    if (isConfirm) {
                                        // console.log('CONFIRMED');
                                        location.reload(true);
                                    }
                                },
                                function() {
                                    // console.log('BACK');
                                }
                            );                    
                        }
                    }
                });

            }  
        }
        
        Main();
    });    
});