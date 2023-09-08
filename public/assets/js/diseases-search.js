$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function showme(){
    console.log('okay show me');
}


$(document).ready(function() {
    
    $("#disease-search").keyup(function() {
        $.ajax({
            type: "GET",
            url: "/api/diseases/search",
            data: 'format=html&keyword=' + $(this).val(),
            beforeSend: function() {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {
                $('#suggestion-box').html(data);
                $('#suggestion-box').show();

                $(".list-item").last().css("border-bottom-left-radius", "10px");
                $(".list-item").last().css("border-bottom-right-radius", "10px");

                // $(".list-item").css("border-left", "solid 1px silver");
                // $(".list-item").css("border-right", "solid 1px silver");

                // const dataStatus = data.status;
                // if (dataStatus == 'OK') {
                //     const diseases = data.diseases;
                //     // $.each(diseases, function( index, record ) {
                //     //     const penyakitId = record.ID1;
                //     //     const namaPenyakit = record.Nama_Penyakit;
                //     //     $('#suggestion-box').append('<div>' + namaPenyakit + '</div>');
                //     //     $('#suggestion-box > div').addClass('list-item');
                //     //     // console.log(namaPenyakit);
                //     // });
                //     // console.log(diseases);
                // } else {
                //     // const message = data.message;
                //     // console.log(message);
                // }                        
                // // $("#suggestion-box").show();
                // // $("#suggestion-box").html(data);
                // // $("#disease-search").css("background", "#FFF");
            }
        });
    });

    $('#disease-input-penyakit-link').click(function(){
        $('#modalInput').modal('show');
    });

    $('#btnDiseaseSubmit').click(function(){ 
        const txtNamaPenyakit = $('#txtpNamaPenyakit').val();
        const txtIcdX = $('#txtpIcdX').val();
        const txtClass = $('#txtpClass').val();
        const txtLamaRawat = $('#txtpLamaRawat').val();
        const txtGKlinis = $('#txtpGKlinis').val(); // gklinis
        const txtPenyebab = $('#txtpPenyebab').val();
        const txtPemeriksaan = $('#txtpPemeriksaan').val(); // P_Lab
        const txtDifferential = $('#txtpDifferential').val();
        const txtPengobatan = $('#txtpPengobatan').val();
        
        const txtPrognosis = $('#txtpPrognosis').val();// prognosis
        
        const txtRemark = $('#txtpRemark').val();
        const txtDiagnosaIcdx = $('#txtpDiagnosaIcdx').val(); // diagnosa sesuai icd-10
        const preExisting =  $('input[name="ppre_existing"]:checked').val();
        


        
        // const txtKomplikasi = $('#txtpKomplikasi').val();
        
        //menyimpan value
        $.ajax({
            type: "POST",
            url: "/diseases/webSave",
            data: { 
                'Nama_Penyakit': txtNamaPenyakit,
                'IcdX': txtIcdX,
                'Class': txtClass,
                'Lama_Rawat': txtLamaRawat,
                'GKlinis': txtGKlinis,
                'Prognosis': txtPrognosis,

                'Penyebab': txtPenyebab,
                'P_Lab': txtPemeriksaan,
                'Differential': txtDifferential,
                'Pengobatan': txtPengobatan,
                'Remark': txtRemark,
                'Diagnosa_Icdx': txtDiagnosaIcdx,
                'pre_existing': preExisting
            },
            beforeSend: function() {
                // todo:
            },
            success: function(data) { 
                $('#modalInput').modal('hide');
                Swal.fire({
                    title: 'Info!',
                    text: 'Data telah disimpan',
                    icon: 'success',
                    confirmButtonText: 'Tutup'
                });
            }
        });
    });
});

$(document).on('click', '.list-item', function(event) {
    const dataId = $(this).attr('data-id');
    $('#disease-id').val(dataId);
    $('#suggestion-box').hide();
    $.ajax({
        type: "GET",
        url: "/api/diseases/detail/" + dataId,
        beforeSend: function() {
            // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data) { 
            console.log(data);
            if (data.status == 'OK'){
                $('#mainTabContainer').css("visibility", "visible");

                const item = data.diseases;
            
                $('#txtClass').html(item.nama_kelas);
                $('#txtIcdX').html(item.icdx); // category
                $("#txtNamaPenyakit").val(item.nama_penyakit);
                $('#txtDiagnosaIcdx').val(item.diagnosa_icdx); // Diagnosa sesuai ICD-10
                $('#txtPenyebab').val(item.penyebab);
                $('#txtPemeriksaan').val(item.p_lab);
                $('#txtPengobatan').val(item.pengobatan);
                $('#txtPrognosis').val(item.prognosis);
                $('#txtGKlinis').val(item.gklinis);
                $('#txtKomplikasi').val('');
                $('#txtDifferential').val(item.differential); // Differential Diagnosa
                $('#txtLamaRawat').val(item.lama_rawat);                                  
                $('#txtRemark').val(item.remark);
                $('#txtKelompok').html(item.nama_kelompok);
    
                const preExisting = item.pre_existing.toUpperCase();
    
                if (preExisting == "YA") {
                    $('#preExisting_yes').prop("checked", true);
                } else {
                    $('#preExisting_no').prop("checked", true);
                }
            } else {
                console.log('status: ERROR');
                Swal.fire({
                    title: 'Info!',
                    text: 'Data penyakit yang anda cari tidak ditemukan',
                    icon: 'info',
                    confirmButtonText: 'OK'
                });
            }

            // $('#txtPrognosis').html(data.Prognosis);
            // $('#tabPreExisting').html(data.pre_existing);
            // $('#tabGKlinis').html(data.GKlinis);
        }
    });
});

$(document).on("mouseover", ".list-item", function(event){
    $(this).css("background-color", "#0c5795");
    $(this).css("color", "white");
});

$(document).on("mouseout", ".list-item", function(event){
    $(this).css("background-color", "#F6F8FA");
    $(this).css("color", "black");
});





    


$(document).on("click", ".btnEdit", function(){
    const targetElement = $(this).attr("data-field");
    $(this).html("Save");
    $(this).attr("class", "btnSave btn btn-sm d-inline justify-content-end text-white");
    $('#' + targetElement).prop("disabled", false);
});

$(document).on("click", ".btnSave", function(){
    const targetElement = $(this).attr("data-field");
    const elemValue = $('#' + targetElement).val();
    const diseaseId = $('#disease-id').val();
    const field = $(this).attr("data-db-field");
    $(this).html("Edit");
    $(this).attr("class", "btnEdit btn btn-sm d-inline justify-content-end text-white");
    $('#' + targetElement).prop("disabled", true);
    console.log(elemValue);
    console.log(field);


 
    $.ajax({
        type: "POST",
        url: "/diseases/webUpdate",
        data: { id: diseaseId, field: field, content: elemValue },
        beforeSend: function() {
            // todo:
        },
        success: function(data) { 
            Swal.fire({
                title: 'Info!',
                text: 'Data telah di Update',
                icon: 'success',
                confirmButtonText: 'Tutup'
            });
        }
    });

});



$(document).on("click", "#btnEditMulti", function(){
    $(this).html("Save");
    $(this).attr("id","btnSaveMulti");
    const tab = $('.groupfield.active').attr("id");
    console.log(tab);
    const targetElement = $('#' + tab).attr("data-field");
    console.log(targetElement);

    $('#' + targetElement).prop("disabled", false);
});

$(document).on("click", "#btnSaveMulti", function(){
    const tab = $('.groupfield.active').attr("id");
    
    const diseaseId = $('#disease-id').val();
    const targetElement = $('#' + tab).attr("data-field");
    const field = $('#' + tab).attr("data-db-field");
    
    const elemValue = $('#' + targetElement).val();
    $(this).html("Edit");
    $(this).attr("id","btnEditMulti");
    $('#' + targetElement).prop("disabled", true);
    console.log(field);
    console.log(elemValue);
    console.log(tab);

    

    $.ajax({
        type: "POST",
        url: "/diseases/webUpdate",
        data: { id: diseaseId, field: field, content: elemValue },
        beforeSend: function() {
            
        },
        success: function(data) { 
            Swal.fire({
                title: 'Info!',
                text: 'Data telah di Update',
                icon: 'success',
                confirmButtonText: 'Tutup'
            });
        }
    });
    
});
// $(document).on("click", "#btnEditMulti2", function(){
//     $(this).html("Save");
//     $(this).attr("id","btnSaveMulti2");
//     const tab = $('.multi.active').attr("id");
//     console.log(tab);
//     const targetElement = $('#' + tab).attr("data-field");
//     console.log(targetElement);
//     $('#' + targetElement).prop("disabled", false);
// });

// $(document).on("click", "#btnSaveMulti2", function(){
//     const tab = $('.multi.active').attr("id");
//     const diseaseId = $('#disease-id').val();
//     const targetElement = $('#' + tab).attr("data-field");
//     const field = $('#' + tab).attr("data-db-field");
//     console.log(field);
//     const elemValue = $('#' + targetElement).val();
//     console.log(elemValue);
//     $(this).html("Edit");
//     $(this).attr("id","btnEditMulti2");
//     $('#' + targetElement).prop("disabled", true);
    

//     $.ajax({
//         type: "POST",
//         url: "/diseases/webUpdate",
//         data: { id: diseaseId, field: field, content: elemValue },
//         beforeSend: function() {
//             // todo:
//         },
//         success: function(data) { 
//             Swal.fire({
//                 title: 'Info!',
//                 text: 'Data telah di Update',
//                 icon: 'success',
//                 confirmButtonText: 'Tutup'
//             });
//         }
//     });
    
// });





// 


$(document).on("click", "#btnEditLamaRawat", function(){
    $('#txtLamaRawat').prop("disabled", false);
});




$(document).on("click", "#btnEditRemark", function(){
    $('#txtRemark').prop("disabled", false);
});









$(document).on("click", "input[name='pre_existing']", function(){
    const preExisting = $(this).val();
    const diseaseId = $('#disease-id').val();
    console.log('Disease ID: ' + diseaseId);
    $.ajax({
        type: "POST",
        url: "/diseases/webUpdate",
        data: { id: diseaseId, field: "pre_existing", content: preExisting },
        beforeSend: function() {
            // todo:
        },
        success: function(data) { 
            Swal.fire({
                title: 'Info!',
                text: 'Data telah diUpdate',
                icon: 'success',
                confirmButtonText: 'Tutup'
            });
        }
    });
});





