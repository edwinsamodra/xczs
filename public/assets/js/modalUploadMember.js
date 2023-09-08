$(document).ready(function(){
    $('#btnOpenMemberUpload').click(function(){
        $('#mdlMemberUpload').modal('show');
    });

    $('#btnUploadMember_submit').click(function(){
        if ($('#inpFileUpload').get(0).files.length == 0) {
            Swal.fire({
                target: '#mdlMemberUpload',
                title: 'Info!',
                text: 'Anda belum memilih file yang akan diupload',
                icon: 'success',
                confirmButtonText: 'Tutup'
            });
        } else {
            const fileUpload = $('#inpFileUpload').prop('files')[0];

            const formData = new FormData($('form')[0]);

            formData.append('member_data', fileUpload);

            $.ajax({
                type: "POST",
                url: "/pendaftaranPeserta/upload",
                data: formData,
                contentType: false,
                processData: false,
                dataType: "json",
                beforeSend: function() {
                    // todo: add animated spinner
                },
                success: function(data) { 
                    console.log(data);
                    if (data.error==0){
                        Swal.fire({
                            title: 'Info!',
                            text: 'Data member sudah diproses',
                            icon: 'success',
                            confirmButtonText: 'Tutup',
                            target: '#mdlMemberUpload'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                location.reload(true);
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Info!',
                            text: 'Terjadi kegagalan proses upload data',
                            icon: 'error',
                            confirmButtonText: 'Tutup',
                            target: '#mdlMemberUpload'
                        });                        
                    }              
                }
            });            
        }
    });
});