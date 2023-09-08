// function renderStats()
// {
//     $.ajax({
//         type: "GET",
//         url: "/ajax/chart/claims",
//         beforeSend: function () {
//             // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
//         },
//         success: function (data) {
//             const numBranches = data.numBranches;
//             const numCompanies = data.numCompanies;
            
//             const numNonCorporateMembers = number_format(parseInt(data.numNonCorporateMembers));
//             const numCorporateMembers = number_format(parseInt(data.numCorporateMembers));
            
//             const numProductsRetail = data.numProductsRetail;
//             const numProductsCorporate = data.numProductsCorporate;

//             const numClaims = data.numClaims;
//             const numVerifyingClaims = data.numVerifyingClaims;
//             const numVerifiedClaims = data.numVerifiedClaims;
//             const numPaidClaims = data.numPaidClaims;

//             $("#numBranches_modal").html(numBranches);
//             $("#numCompanies_modal").html(numCompanies);
//             $("#numNonCorporateMembers_modal").html(numNonCorporateMembers);
//             $("#numCorporateMembers_modal").html(numCorporateMembers);
//             $("#numProductsRetail_modal").html(numProductsRetail);
//             $("#numProductsCorporate_modal").html(numProductsCorporate);
//             $("#numClaims_modal").html(numClaims);
//             $("#numVerifyingClaims_modal").html(numVerifyingClaims);
//             $("#numVerifiedClaims_modal").html(numVerifiedClaims);
//             $("#numPaidClaims_modal").html(numPaidClaims);           
//         },
//     });     
// }


function renderTablekk(page=1,keyword='')
{
    url = '/ajax/kepesertaan/KK';

    if (parseInt(page)<=0){
        var pageno = 1;    
    } else {
        var pageno = page;
    }

    var data = {
        page: pageno,
        keyword: keyword
    };

    $.ajax({
        type: "GET",
        url: url,
        data: data,
        beforeSend: function () {
            // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function (data) {
            if (parseInt(data.error)==0){
                var numRows = data.numRows;
                var numPages = data.numPages;
                var page = data.page;

                $('#modalKepesertaan_tableContainer').html(data.content);
                $('#modalKepesertaan_paginationContainer').html(data.pagination);
                // renderPagination(numPages, page);
            } else {
                console.log('ERROR: Failed loading AJAX response');
            }
        },
    }); 
}


$('#modalKepesertaan_paginationContainer').on('click', '.page-link', function(){
    var page = $(this).data('id');
    var keyword = $('#modalKepesertaan_keyword').val();
    if (isNaN(page)){

    } else {
        if (parseInt(page) > 0){
            renderTablekk(page, keyword);
        }        
    }
    
});

$(document).ready(function(){  
    $('#jumlah_KK').click(function(){
        $('#modalKepesertaan_keyword').val('');
        $('#modalKepesertaan_txtPage').val('');

        $('#modalDetailKepesertaanJKP').modal('show');
        $('#modalInputLabelpeserta').html('Jumlah Kepala Keluarga');
        $('#datakepesesrtaan').html('Data Kepala Keluarga');

        // renderStats();
        renderTablekk();
    });

    $('#modalKepesertaan_btnSearch').click(function(){
        var keyword = $('#modalKepesertaan_keyword').val();
        renderTablekk(1, keyword);
    });

    $('#modalKepesertaan_btnPage').click(function(){
        var page = $('#modalKepesertaan_txtPage').val();
        var keyword = $('#modalKepesertaan_keyword').val();
        renderTablekk(page, keyword);
    });
});