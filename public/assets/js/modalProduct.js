function renderStatsProdukRitel()
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

       

            
            $("#numBranches_modalritel").html(numBranches);
            $("#numCompanies_modalritel").html(numCompanies);
            $("#numNonCorporateMembers_modalritel").html(numNonCorporateMembers);
            $("#numCorporateMembers_modalritel").html(numCorporateMembers);
            $("#numProductsRetail_modalritel").html(numProductsRetail);
            $("#numProductsCorporate_modalritel").html(numProductsCorporate);
                  
        },
    });     
}
function renderStatsProdukKorporasi()
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

       

            
            $("#numBranches_modalkorporasi").html(numBranches);
            $("#numCompanies_modalkorporasi").html(numCompanies);
            $("#numNonCorporateMembers_modalkorporasi").html(numNonCorporateMembers);
            $("#numCorporateMembers_modalkorporasi").html(numCorporateMembers);
            $("#numProductsRetail_modalkorporasi").html(numProductsRetail);
            $("#numProductsCorporate_modalkorporasi").html(numProductsCorporate);
                   
        },
    });     
}

function renderTableProdukRitel(page=1,keyword='')
{
    url = '/ajax/profile/produkritel';

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

                $('#modalProfileProdukRitel_tableContainer').html(data.content);
                renderPaginationProdukRitel(numPages, page);
            } else {
                console.log('ERROR: Failed loading AJAX response');
            }
        },
    }); 
}
function renderTableProdukKorporasi(page=1,keyword='')
{
    url = '/ajax/profile/produkkorporasi';

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

                $('#modalProfileProdukKorporasi_tableContainer').html(data.content);
                renderPaginationProdukKorporasi(numPages, page);
            } else {
                console.log('ERROR: Failed loading AJAX response');
            }
        },
    }); 
}


function renderPaginationProdukRitel(numPages, page)
{
    $('#modalProfileProdukRitel_paginationContainer').html('');

    var prev = parseInt(page) - 1;
    var next = parseInt(page) + 1;

    var content = '<nav aria-label="Page navigation example">';
    content += '<ul class="pagination">';

    if (parseInt(prev) <= 0){
        prev = 1;
    } else {
        // content += '<li class="page-item"><a data-page="' + prev + '" class="page-link" href="#">Previous</a></li>';
    }
    

    var pagelink = '';
    for (hitung=1;hitung <= numPages; hitung++){
        if (hitung == page){
            pagelink += '<li data-page="' + hitung + '" class="page-item active"><a data-page="' + hitung + '" class="page-link" href="#">' + hitung + '</a></li>';
        } else {
            pagelink += '<li data-page="' + hitung + '" class="page-item"><a data-page="' + hitung + '" class="page-link" href="#">' + hitung + '</a></li>';
        }
        
    }
    
    content += pagelink;

    if (parseInt(next) >= numPages){
        next = numPages;
    } else {
        // content += '<li data-page="' + next + '" class="page-item"><a data-page="' + next + '"class="page-link" href="#">Next</a></li>';
    }
    
    content += '</ul>';
    content += '</nav>';

    $('#modalProfileProdukRitel_paginationContainer').html(content);
}
function renderPaginationProdukKorporasi(numPages, page)
{
    $('#modalProfileProdukKorporasi_paginationContainer').html('');

    var prev = parseInt(page) - 1;
    var next = parseInt(page) + 1;

    var content = '<nav aria-label="Page navigation example">';
    content += '<ul class="pagination">';

    if (parseInt(prev) <= 0){
        prev = 1;
    } else {
        // content += '<li class="page-item"><a data-page="' + prev + '" class="page-link" href="#">Previous</a></li>';
    }
    

    var pagelink = '';
    for (hitung=1;hitung <= numPages; hitung++){
        if (hitung == page){
            pagelink += '<li data-page="' + hitung + '" class="page-item active"><a data-page="' + hitung + '" class="page-link" href="#">' + hitung + '</a></li>';
        } else {
            pagelink += '<li data-page="' + hitung + '" class="page-item"><a data-page="' + hitung + '" class="page-link" href="#">' + hitung + '</a></li>';
        }
        
    }
    
    content += pagelink;

    if (parseInt(next) >= numPages){
        next = numPages;
    } else {
        // content += '<li data-page="' + next + '" class="page-item"><a data-page="' + next + '"class="page-link" href="#">Next</a></li>';
    }
    
    content += '</ul>';
    content += '</nav>';

    $('#modalProfileProdukKorporasi_paginationContainer').html(content);
}


$('#modalDetailProfileProdukRetail').on("click", ".page-link", function(event){
    console.log('page item clicked');
    var page = $(this).data('page');
    var keyword = $('#modalDetailProfileProdukRitel_keyword').val();
    renderTableProdukRitel(page, keyword);
});
$('#modalDetailProfileProdukKorporasi').on("click", ".page-link", function(event){
    console.log('page item clicked');
    var page = $(this).data('page');
    var keyword = $('#modalDetailProfileProdukKorporasi_keyword').val();
    renderTableProdukKorporasi(page, keyword);
});

$(document).ready(function(){  
    $('#produkritelBox').click(function(){
        $('#modalDetailProfileProdukRitel_keyword').val('');
        $('#modalDetailProfileProdukRitel_txtPage').val('');
       
        $('#modalDetailProfileProdukRetail').modal('show');
        renderStatsProdukRitel();     
        renderTableProdukRitel();
        
        $('#modalDetailProfileProdukRitel_btnSearch').click(function(){
            var keyword = $('#modalDetailProfileProdukRitel_keyword').val();
            renderTableProdukRitel(1, keyword);
        });
    
        $('#modalDetailProfileProdukRitel_btnPage').click(function(){
            var page = $('#modalDetailProfileProdukRitel_txtPage').val();
            var keyword = $('#modalDetailProfileProdukRitel_keyword').val();
            renderTableProdukRitel(page, keyword);
        });


    });

    $('#produkkorporasiBox').click(function(){
        $('#modalDetailProfileProdukKorporasi_keyword').val('');
        $('#modalDetailProfileProdukKorporasi_txtPage').val('');
       
        $('#modalDetailProfileProdukKorporasi').modal('show');
        renderStatsProdukKorporasi();     
        renderTableProdukKorporasi();
        
        $('#modalDetailProfileProdukKorporasi_btnSearch').click(function(){
            var keyword = $('#modalDetailProfileProdukKorporasi_keyword').val();
            renderTableProdukKorporasi(1, keyword);
        });
    
        $('#modalDetailProfileProdukKorporasi_btnPage').click(function(){
            var page = $('#modalDetailProfileProdukKorporasi_txtPage').val();
            var keyword = $('#modalDetailProfileProdukKorporasi_keyword').val();
            renderTableProdukKorporasi(page, keyword);
        });


    });
});
