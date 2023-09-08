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
                    $('#displayProfile_pimpinan').html(content.nama_pimpinan);
                    $('#displayProfile_alamat').html(content.alamat);
                    $('#displayProfile_kelurahan').html(content.nama_kelurahan);
                    $('#displayProfile_kecamatan').html(content.nama_kecamatan);
                    $('#displayProfile_kota').html(content.nama_kota);
                    $('#displayProfile_propinsi').html(content.nama_propinsi);
                    $('#displayProfile_kodepos').html(content.kode_pos);
                    $('#displayProfile_tanggalRegistrasi').html(content.tgl_registrasi);
                }                
            }
        });

        
    });

    $('#modalEditProfileLoader').click(function(){
        console.log('YOU CLICK IT');

        var kodeKlinik = $(this).data('kode-klinik');
        console.log(kodeKlinik);

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
                    $('#modalEditProfile').modal('show');

                    $('#inpEditProfile_').val(content.nama_pimpinan);
                    $('#inpEditProfile_alamat').val(content.alamat);
                    $('#inpEditProfile_').val(content.nama_kelurahan);
                    $('#inpEditProfile_').val(content.nama_kecamatan);
                    $('#inpEditProfile_').val(content.nama_kota);
                    $('#inpEditProfile_').val(content.nama_propinsi);
                    $('#inpEditProfile_').val(content.kode_pos);
                    $('#inpEditProfile_').val(content.tgl_registrasi);
                }                
            }
        });        
    });
});