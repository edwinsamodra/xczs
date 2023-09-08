function renderCorporateMemberStats()
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
            
            $("#numBranches_modalCorporateMember").html(numBranches);
            $("#numCompanies_modalCorporateMember").html(numCompanies);
            $("#numNonCorporateMembers_modalCorporateMember").html(numNonCorporateMembers);
            $("#numCorporateMembers_modalCorporateMember").html(numCorporateMembers);
            $("#numProductsRetail_modalCorporateMember").html(numProductsRetail);
            $("#numProductsCorporate_modalCorporateMember").html(numProductsCorporate);
                  
        },
    });     
}


function renderCorporateMemberTable(page=1,keyword='')
{
    url = '/ajax/profile/members';

    if (parseInt(page)<=0){
        var pageno = 1;    
    } else {
        var pageno = page;
    }

    var data = {
        page: pageno,
        keyword: keyword,
        // type: 'corporate'
    };

    $.ajax({
        type: "GET",
        url: url,
        data: data,
        beforeSend: function () {
            // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            console.log('Prepare to send AJAX request');
        },
        success: function (data) {
            if (parseInt(data.error)==0){
                var numRows = data.numRows;
                var numPages = data.numPages;
                var page = data.page;
                // console.log(data.content);

                $('#modalProfileCorporateMember_tableContainer').html(data.content);
                $('#modalProfileCorporateMember_paginationContainer').html(data.pagination);

            } else {
                console.log('ERROR: Failed loading AJAX response');
            }
        },
    }); 
}

$('#modalDetailProfileCorporateMember').on('click', '.page-link', function(){
    var page = $(this).data('id');
    var keyword = $('#modalDetailProfileCorporateMember_keyword').val();
    console.log('you click page ' + page);
    renderCorporateMemberTable(page, keyword);
});

// $('#modalDetailProfileCorporateMember').on('change', '#modalProfileCorporateMember_tableContainer', function(){
//     console.log('Table container changed' + get_time());
// });

// $('#modalDetailProfileCorporateMember').on('click', '#modalDetailProfileCorporateMember_btnPage', function(){
//     var page = $('#modalDetailProfileCorporateMember_txtPage').val();
//     var keyword = $('#modalDetailProfileCorporateMember_keyword').val();
//     renderCorporateMemberTable(page, keyword);
// });

$(document).ready(function(){  
    $('#corporateMemberBox').click(function(){
        $('#modalDetailProfileCorporateMember_keyword').val('');
        $('#modalDetailProfileCorporateMember_txtPage').val('');

        $('#modalDetailProfileCorporateMember').modal('show');

        renderCorporateMemberStats();
        renderCorporateMemberTable();
    });

    $('#modalDetailProfileCorporateMember_btnSearch').click(function(){
        var keyword = $('#modalDetailProfileCorporateMember_keyword').val();
        renderCorporateMemberTable(1, keyword);
    });

    $('#modalDetailProfileCorporateMember_btnPage').click(function(){
        var page = $('#modalDetailProfileCorporateMember_txtPage').val();
        var keyword = $('#modalDetailProfileCorporateMember_keyword').val();
        renderCorporateMemberTable(page, keyword);
    });
});