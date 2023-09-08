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


$(document).ready(function(){  
    $('#produkkorporasiBox').click(function(){
        $('#modalDetailProfileProdukKorporasi').modal('show');
        renderStats();        

        // start datatables
        var table = $('#tblProdukKorporasi').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            pageLength: 5,
            ajax: "/ajax/productperusahaan",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama_produk', name: 'nama_produk'},
                {data: 'jenis_produk', name: 'jenis_produk'},
                
            ],
        });
        // end datatables 

    });
   

    
});