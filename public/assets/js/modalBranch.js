function renderStats()
{
    $.ajax({
        type: "GET",
        url: "/ajax/chart/claims",
        beforeSend: function () {
            // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function (data) {
            const numBranches = data.numBranches;
            const numCompanies = data.numCompanies;
            
            const numNonCorporateMembers = number_format(parseInt(data.numNonCorporateMembers));
            const numCorporateMembers = number_format(parseInt(data.numCorporateMembers));
            
            const numProductsRetail = data.numProductsRetail;
            const numProductsCorporate = data.numProductsCorporate;

            const numClaims = data.numClaims;
            const numVerifyingClaims = data.numVerifyingClaims;
            const numVerifiedClaims = data.numVerifiedClaims;
            const numPaidClaims = data.numPaidClaims;

            $("#numBranches_modal").html(numBranches);
            $("#numCompanies_modal").html(numCompanies);
            $("#numNonCorporateMembers_modal").html(numNonCorporateMembers);
            $("#numCorporateMembers_modal").html(numCorporateMembers);
            $("#numProductsRetail_modal").html(numProductsRetail);
            $("#numProductsCorporate_modal").html(numProductsCorporate);
            $("#numClaims_modal").html(numClaims);
            $("#numVerifyingClaims_modal").html(numVerifyingClaims);
            $("#numVerifiedClaims_modal").html(numVerifiedClaims);
            $("#numPaidClaims_modal").html(numPaidClaims);           
        },
    });     
}


function renderTable(page=1,keyword='')
{
    url = '/ajax/profile/branches';

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

                $('#modalProfileBranch_tableContainer').html(data.content);
                $('#modalProfileBranch_paginationContainer').html(data.pagination);
                // renderPagination(numPages, page);
            } else {
                console.log('ERROR: Failed loading AJAX response');
            }
        },
    }); 
}


$('#modalProfileBranch_paginationContainer').on('click', '.page-link', function(){
    var page = $(this).data('id');
    var keyword = $('#modalDetailProfileCabang_keyword').val();
    if (isNaN(page)){

    } else {
        if (parseInt(page) > 0){
            renderTable(page, keyword);
        }        
    }
    
});

$(document).ready(function(){  
    $('#branchBox').click(function(){
        $('#modalDetailProfileCabang_keyword').val('');
        $('#modalDetailProfileCabang_txtPage').val('');

        $('#modalDetailProfileCabang').modal('show');

        renderStats();
        renderTable();
    });

    $('#modalDetailProfileCabang_btnSearch').click(function(){
        var keyword = $('#modalDetailProfileCabang_keyword').val();
        renderTable(1, keyword);
    });

    $('#modalDetailProfileCabang_btnPage').click(function(){
        var page = $('#modalDetailProfileCabang_txtPage').val();
        var keyword = $('#modalDetailProfileCabang_keyword').val();
        renderTable(page, keyword);
    });
});