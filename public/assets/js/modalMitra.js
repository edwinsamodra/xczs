// function renderTable(page=1,keyword='')
// {
//     url = '/ajax/profile/branches';

//     if (parseInt(page)<=0){
//         var pageno = 1;    
//     } else {
//         var pageno = page;
//     }

//     var data = {
//         page: pageno,
//         keyword: keyword
//     };

//     $.ajax({
//         type: "GET",
//         url: url,
//         data: data,
//         beforeSend: function () {
//             // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
//         },
//         success: function (data) {
//             if (parseInt(data.error)==0){
//                 var numRows = data.numRows;
//                 var numPages = data.numPages;
//                 var page = data.page;

//                 $('#modalProfileBranch_tableContainer').html(data.content);
//                 $('#modalProfileBranch_paginationContainer').html(data.pagination);
//                 // renderPagination(numPages, page);
//             } else {
//                 console.log('ERROR: Failed loading AJAX response');
//             }
//         },
//     }); 
// }


// $('#modalProfileBranch_paginationContainer').on('click', '.page-link', function(){
//     var page = $(this).data('id');
//     var keyword = $('#modalDetailProfileCabang_keyword').val();
//     if (isNaN(page)){

//     } else {
//         if (parseInt(page) > 0){
//             renderTable(page, keyword);
//         }        
//     }
    
// });

$(document).ready(function(){  
    $('#jumlah_Mitra').click(function(){
        $('#modalKepesertaan_keyword').val('');
        $('#modalKepesertaan_txtPage').val('');

        $('#modalDetailKepesertaanJKP').modal('show');
        $('#modalInputLabelpeserta').html('Jumlah Mitra');
        $('#datakepesesrtaan').html('Data Peserta Mitra');
    });

    // $('#modalDetailProfileCabang_btnSearch').click(function(){
    //     var keyword = $('#modalDetailProfileCabang_keyword').val();
    //     renderTable(1, keyword);
    // });

    // $('#modalDetailProfileCabang_btnPage').click(function(){
    //     var page = $('#modalDetailProfileCabang_txtPage').val();
    //     var keyword = $('#modalDetailProfileCabang_keyword').val();
    //     renderTable(page, keyword);
    // });
});