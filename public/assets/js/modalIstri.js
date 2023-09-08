function renderTableistri(page=1,keyword='')
{
    url = '/ajax/kepesertaan/istri';

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
            renderTableistri(page, keyword);
        }        
    }
    
});

$(document).ready(function(){  
    $('#istri_Peserta').click(function(){
        $('#modalKepesertaan_keyword').val('');
        $('#modalKepesertaan_txtPage').val('');

        $('#modalDetailKepesertaanJKP').modal('show');
        $('#modalInputLabelpeserta').html('Jumlah Istri');
        $('#datakepesesrtaan').html('Data Peserta Istri');

        // renderStats();
        renderTableistri();
    });

    $('#modalKepesertaan_btnSearch').click(function(){
        var keyword = $('#modalKepesertaan_keyword').val();
        renderTableistri(1, keyword);
    });

    $('#modalKepesertaan_btnPage').click(function(){
        var page = $('#modalKepesertaan_txtPage').val();
        var keyword = $('#modalKepesertaan_keyword').val();
        renderTableistri(page, keyword);
    });
});