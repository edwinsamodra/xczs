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
        // GET DATA
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

                    // $('#').val(profile.id_asuransi);

                    $('#inpEditProfile_kodeAsuransi').val(profile.kode_asuransi);
                    $('#inpEditProfile_namaAsuransi').val(profile.nama_asuransi);

                    $('#inpEditProfile_alamat').val(profile.alamat);
                    // $('#').val(data.kota);
                    
                    $('#inpEditProfile_idkelurahan').val(profile.id_dc_kelurahan);
                    $('#inpEditProfile_kelurahan').val(profile.nama_kelurahan);

                    $('#inpEditProfile_idkota').val(profile.id_dc_kota);
                    $('#inpEditProfile_kota').val(profile.nama_kota);

                    $('#inpEditProfile_idkecamatan').val(profile.id_dc_kecamatan);
                    $('#inpEditProfile_kecamatan').val(profile.nama_kecamatan);

                    // $('#').val(profile.id_dc_propinsi);
                    // $('#').val(profile.nama_propinsi);
                                       
                    $('#inpEditProfile_kodepos').val(profile.kodepos);
                    
                    $('#inpEditProfile_telepon1').val(profile.telpon1);
                    $('#inpEditProfile_telepon2').val(profile.telpon2);
                    
                    $('#inpEditProfile_kontakPerson1').val(profile.kontakperson);
                    $('#inpEditProfile_kontakPerson2').val(profile.kontakperson2);

                    // $('#').val(data.fax);

                    $('#inpEditProfile_tglDaftar').val(profile.tgl_daftar);
                    
                    $('#inpEditProfile_hp').val(profile.hp);

                    $('#inpEditProfile_noNIB').val(profile.nomer_nib);

                    $('#inpEditProfile_tglNIB').val(profile.tgl_NIB);

                    // $('#').val(profile.kode_group);

                    $('#inpEditProfile_alamatTagihan').val(profile.alamat_tagihan);
                    $('#inpEditProfile_jenisKerjasama').val(profile.jenis_kerjasama);
                    
                    // $('#').val(profile.jenis_perusahaan);

                    // $('#').val(profile.logo_asuransi); // todo
                    
                    $('#inpEditProfile_noSuratKontrak').val(profile.no_surat_kontrak);
                    $('#inpEditProfile_tglKontrak').val(profile.tgl_kontrak);
                    $('#inpEditProfile_tglExpired').val(profile.tgl_expired);

                    $('#inpEditProfile_namaPimpinan').val(profile.pimpinan);
                    
                    // $('#').val(profile.url_asuransi);

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
                $('#inpEditProfile_kodepos').val(data[0].kode_pos);
                $('#inpEditProfile_kecamatan').val(data[0].nama_kecamatan);
                $('#inpEditProfile_idkecamatan').val(data[0].id_dc_kecamatan);
                $('#inpEditProfile_kota').val(data[0].nama_kota);
                $('#inpEditProfile_idkota').val(data[0].id_dc_kota);
                $('#inpEditProfile_idkelurahan').val(idKelurahan);

                	
            }
        });
    });


    $('#btnEditProfile_save').click(function(){
        let kodeAsuransi   = $('#inpEditProfile_kodeAsuransi').val();
        let namaAsuransi   = $('#inpEditProfile_namaAsuransi').val();
        let namaPimpinan   = $('#inpEditProfile_namaPimpinan').val();
        let alamat         = $('#inpEditProfile_alamat').val();
        
        let idkelurahan      = $('#inpEditProfile_idkelurahan').val();
        let idkecamatan      = $('#inpEditProfile_idkecamatan').val();        
        let idkota           = $('#inpEditProfile_idkota').val();
        
        // let kota           = $('#inpEditProfile_kota').val();
        
        let kode_pos        = $('#inpEditProfile_kodepos').val();
        let telpon1         = $('#inpEditProfile_telepon1').val();
        let telpon2         = $('#inpEditProfile_telepon2').val();
        let kontakPerson    = $('#inpEditProfile_kontakPerson1').val();
        let kontakPerson2   = $('#inpEditProfile_kontakPerson2').val();
        let hp              = $('#inpEditProfile_hp').val();
        let tgl_daftar      = $('#inpEditProfile_tglDaftar').val();
        let tgl_nib         = $('#inpEditProfile_tglNIB').val();
        let alamat_tagihan  = $('#inpEditProfile_alamatTagihan').val();
        let jenis_kerjasama = $('#inpEditProfile_jenisKerjasama').val();
        
        let formData = new FormData($('form')[0]);

        formData.append('kode_asuransi', kodeAsuransi);
        formData.append('nama_asuransi', namaAsuransi);    
        formData.append('pimpinan', namaPimpinan);    
        formData.append('alamat', alamat);

        formData.append('id_dc_kelurahan', idkelurahan);
        formData.append('id_dc_kecamatan', idkecamatan);
        formData.append('id_dc_kota', idkota);
        
        // formData.append('kota', kota);

        formData.append('kode_pos', kode_pos);
        formData.append('telpon1', telpon1);
        formData.append('telpon2', telpon2);
        formData.append('kontakPerson', kontakPerson);
        formData.append('kontakPerson2', kontakPerson2);
        formData.append('hp', hp);
        formData.append('tgl_daftar', tgl_daftar);
        formData.append('tgl_nib', tgl_nib);
        formData.append('alamat_tagihan', alamat_tagihan);
        formData.append('jenis_kerjasama', jenis_kerjasama);

        var filenames = $('#inpEditProfile_logo')[0].files;

        if (filenames.length > 0){
            let logo = $('#inpEditProfile_logo').prop('files')[0];
            formData.append('logo_asuransi', logo);
        }        

        // start
        $.ajax({
            type: "POST",
            url: "/asuransi",
            data: formData,
            contentType: false,
            processData: false,
            dataType: "json",
            beforeSend: function() {
                // todo:
            },
            success: function(data) { 
                let statusCode = data.statusCode;

                if (parseInt(statusCode) == 200){
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
        // end
    });    
});