// function renderMemberStats()
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
            
//             $("#numBranches_modalmember").html(numBranches);
//             $("#numCompanies_modalmember").html(numCompanies);
//             $("#numNonCorporateMembers_modalmember").html(numNonCorporateMembers);
//             $("#numCorporateMembers_modalmember").html(numCorporateMembers);
//             $("#numProductsRetail_modalmember").html(numProductsRetail);
//             $("#numProductsCorporate_modalmember").html(numProductsCorporate);
                  
//         },
//     });     
// }


// $(document).ready(function(){  
//     $('#personalMemberBox').click(function(){
//         $('#modalDetailProfilePesertaUmum').modal('show');
//         renderMemberStats();
//     });
// });



function renderUmumMemberStats()
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
            
            $("#numBranches_modalUmumMember").html(numBranches);
            $("#numCompanies_modalUmumMember").html(numCompanies);
            $("#numNonCorporateMembers_modalUmumMember").html(numNonCorporateMembers);
            $("#numCorporateMembers_modalUmumMember").html(numCorporateMembers);
            $("#numProductsRetail_modalUmumMember").html(numProductsRetail);
            $("#numProductsCorporate_modalUmumMember").html(numProductsCorporate);
                  
        },
    });     
}


function renderUmumMemberTable(page=1,keyword='')
{
    url = '/ajax/profile/membersumum';

    if (parseInt(page)<=0){
        var pageno = 1;    
    } else {
        var pageno = page;
    }

    var data = {
        page: pageno,
        keyword: keyword,
        type: 'personal'
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

                $('#modalProfileUmumMember_tableContainer').html(data.content);
                $('#modalProfileUmumMember_paginationContainer').html(data.pagination);

            } else {
                console.log('ERROR: Failed loading AJAX response');
            }
        },
    }); 
}

$('#modalProfileUmumMember_paginationContainer').on('click', '.page-link', function(){
    var page = $(this).data('id');
    var keyword = $('#modalDetailProfileUmumMember_keyword').val();
    console.log('you click page ' + page);
    renderUmumMemberTable(page, keyword);
});

// $('#modalDetailProfileCorporateMember').on('change', '#modalProfileCorporateMember_tableContainer', function(){
//     console.log('Table container changed' + get_time());
// });

// $('#modalDetailProfilePesertaUmum').on('click', '#modalDetailProfileCorporateMember_btnPage', function(){
//     var page = $('#modalDetailProfileUmumMember_txtPage').val();
//     var keyword = $('#modalDetailProfileUmumMember_keyword').val();
//     renderUmumMemberTable(page, keyword);
// });

$(document).ready(function(){  
    $('#personalMemberBox').click(function(){
        $('#modalDetailProfileUmumMember_keyword').val('');
        $('#modalDetailProfileUmumMember_txtPage').val('');

        $('#modalDetailProfilePesertaUmum').modal('show');

        renderUmumMemberStats();
        renderUmumMemberTable();
    });

    $('#modalDetailProfileUmumMember_btnSearch').click(function(){
        var keyword = $('#modalDetailProfileUmumMember_keyword').val();
        renderUmumMemberTable(1, keyword);
    });

    $('#modalDetailProfileUmumMember_btnPage').click(function(){
        var page = $('#modalDetailProfileUmumMember_txtPage').val();
        var keyword = $('#modalDetailProfileUmumMember_keyword').val();
        renderUmumMemberTable(page, keyword);
    });
});