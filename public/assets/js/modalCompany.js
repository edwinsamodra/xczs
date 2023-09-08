function renderStatsCompany()
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

            
            $("#numBranches_modalcompany").html(numBranches);
            $("#numCompanies_modalcompany").html(numCompanies);
            $("#numNonCorporateMembers_modalcompany").html(numNonCorporateMembers);
            $("#numCorporateMembers_modalcompany").html(numCorporateMembers);
            $("#numProductsRetail_modalcompany").html(numProductsRetail);
            $("#numProductsCorporate_modalcompany").html(numProductsCorporate);
            $("#numClaims_modalcompany").html(numClaims);
            $("#numVerifyingClaims_modalcompany").html(numVerifyingClaims);
            $("#numVerifiedClaims_modalcompany").html(numVerifiedClaims);
            $("#numPaidClaims_modalcompany").html(numPaidClaims);           
        },
    });     
}

function renderTableCompany(page=1,keyword='')
{
    url = '/ajax/profile/companies';

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

                $('#modalProfileCompany_tableContainer').html(data.content);
                $('#modalProfileMitra_paginationContainer').html(data.pagination);

                // renderPaginationCompany(numPages, page);
            } else {
                console.log('ERROR: Failed loading AJAX response');
            }
        },
    }); 
}


// function renderPaginationCompany(numPages, page)
// {
//     $('#modalProfileCompany_paginationContainer').html('');

//     var prev = parseInt(page) - 1;
//     var next = parseInt(page) + 1;

//     var content = '<nav aria-label="Page navigation example">';
//     content += '<ul class="pagination">';

//     if (parseInt(prev) <= 0){
//         prev = 1;
//     } else {
//         // content += '<li class="page-item"><a data-page="' + prev + '" class="page-link" href="#">Previous</a></li>';
//     }
    

//     var pagelink = '';
//     for (hitung=1;hitung <= numPages; hitung++){
//         if (hitung == page){
//             pagelink += '<li data-page="' + hitung + '" class="page-item active"><a data-page="' + hitung + '" class="page-link" href="#">' + hitung + '</a></li>';
//         } else {
//             pagelink += '<li data-page="' + hitung + '" class="page-item"><a data-page="' + hitung + '" class="page-link" href="#">' + hitung + '</a></li>';
//         }
        
//     }
    
//     content += pagelink;

//     if (parseInt(next) >= numPages){
//         next = numPages;
//     } else {
//         // content += '<li data-page="' + next + '" class="page-item"><a data-page="' + next + '"class="page-link" href="#">Next</a></li>';
//     }
    
//     content += '</ul>';
//     content += '</nav>';

//     $('#modalProfileCompany_paginationContainer').html(content);
// }


$('#modalProfileMitra_paginationContainer').on("click", ".page-link", function(){
    console.log('page item clicked');
    var page = $(this).data('id');
    var keyword = $('#modalDetailProfileMitra_keyword').val();
    renderTableCompany(page, keyword);
});

$(document).ready(function(){  
    $('#companyBox').click(function(){
        $('#modalDetailProfileMitra_keyword').val('');
        $('#modalDetailProfileMitra_txtPage').val('');
       
        $('#modalDetailProfileMitra').modal('show');
        renderStatsCompany();     
        renderTableCompany();
        
        $('#modalDetailProfileMitra_btnSearch').click(function(){
            var keyword = $('#modalDetailProfileMitra_keyword').val();
            renderTableCompany(1, keyword);
        });
    
        $('#modalDetailProfileMitra_btnPage').click(function(){
            var page = $('#modalDetailProfileMitra_txtPage').val();
            var keyword = $('#modalDetailProfileMitra_keyword').val();
            renderTableCompany(page, keyword);
        });

        // start datatables
        // var table = $('#tblCompanie').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     ordering: true,
        //     pageLength: 5,
        //     ajax: "/ajax/companie",
        //     columns: [
        //         {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        //         {data: 'nama_perusahaan', name: 'nama_perusahaan'},
        //         {data: 'nama_cabang', name: 'nama_cabang'},
        //         {data: 'periode', name: 'periode'},
        //         {data: 'alamat', name: 'alamat'},
        //         {data: 'nomor_telepon', name: 'nomor_telepon'},
        //         {data: 'email', name: 'email'},
        //         {data: 'nama_direktur', name: 'nama_direktur'},
        //         {data: 'nama_contact_person', name: 'nama_contact_person'},
        //         {data: 'telp_contact_person', name: 'telp_contact_person'},
        //         {data: 'nama_produk', name: 'nama_produk'},
        //     ],
        // });
        // end datatables 

    });
});