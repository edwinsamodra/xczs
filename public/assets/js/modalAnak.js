function renderTableanak(page=1,keyword='')
{
    url = '/ajax/kepesertaan/anak';

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
            renderTableanak(page, keyword);
        }        
    }
    
});

$(document).ready(function(){  
    $('#anak_Peserta').click(function(){
        $('#modalKepesertaan_keyword').val('');
        $('#modalKepesertaan_txtPage').val('');

        $('#modalDetailKepesertaanJKP').modal('show');
        $('#modalInputLabelpeserta').html('Jumlah Anak');
        $('#datakepesesrtaan').html('Data Peserta Anak');



        // renderStats();
        renderTableanak();
    });

    $('#modalKepesertaan_btnSearch').click(function(){
        var keyword = $('#modalKepesertaan_keyword').val();
        renderTableanak(1, keyword);
    });

    $('#modalKepesertaan_btnPage').click(function(){
        var page = $('#modalKepesertaan_txtPage').val();
        var keyword = $('#modalKepesertaan_keyword').val();
        renderTableanak(page, keyword);
    });
});