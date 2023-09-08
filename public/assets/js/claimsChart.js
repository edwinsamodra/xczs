$(document).ready(function () {
    var numBranches = 0; // jumlah cabang
    var numCompanies = 0; // jumlah mitra perusahaan
    
    var numCorporateMembers = 0; // peserta perusahaan
    var numPersonalMembers = 0; // peserta umum
    
    var numProductsCorporate = 0; // jumlah produk korporasi
    var numProductsRetail = 0; // jumlah produk ritel

    var numClaims = 0;
    var numVerifyingClaims = 0;
    var numVerifiedClaims = 0;
    var numPaidClaims = 0;

    var productStats = {
        numProductsCorporate:0,
        numProductsRetail:0
    };

    $.ajax({
        type: "GET",
        url: "/ajax/branches/count",
        beforeSend: function () {
            // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function (data) {
            if (data.error == 0){
				numBranches = data.count;
			}
        },
    });

    $.ajax({
        type: "GET",
        url: "/ajax/companies/count",
        beforeSend: function () {
            // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function (data) {
            if (data.error == 0){
				numCompanies = data.count;
			}
        },
    });

    $.ajax({
        type: "GET",
        url: "/ajax/members-corporate/count",
        beforeSend: function () {
            // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function (data) {
            if (data.error == 0){
				numCorporateMembers = data.count;
			}
        },
    });

    $.ajax({
        type: "GET",
        url: "/ajax/members-personal/count",
        beforeSend: function () {
            // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function (data) {
            if (data.error == 0){
				numPersonalMembers = data.count;
			}
        },
    });

    $.ajax({
        type: "GET",
        url: "/ajax/products-corporate/count",
        beforeSend: function () {
            // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function (data) {
            if (data.error == 0){
                productStats.numProductsCorporate = data.count;
                console.log("Jumlah Produk Korporat: " + productStats.numProductsCorporate);
				// numProductsCorporate = data.count;
			}
        },
    });

    $.ajax({
        type: "GET",
        url: "/ajax/products-retail/count",
        beforeSend: function () {
            // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function (data) {
            if (data.error == 0){
                productStats.numProductsRetail = data.count;
                console.log("Jumlah Produk Retail: " + productStats.numProductsRetail);
				// numProductsRetail = data.count;
			}
        },
    });

    $.ajax({
        type: "GET",
        url: "/ajax/chart/claims",
        beforeSend: function () {
            // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function (data) {
            // const numBranches = data.numBranches;
            // const numCompanies = data.numCompanies;
            
            // const numNonCorporateMembers = number_format(parseInt(data.numNonCorporateMembers));
            // const numCorporateMembers = number_format(parseInt(data.numCorporateMembers));
            
            // const numProductsRetail = data.numProductsRetail;
            // const numProductsCorporate = data.numProductsCorporate;

            const numClaims = data.numClaims;
            const numVerifyingClaims = data.numVerifyingClaims;
            const numVerifiedClaims = data.numVerifiedClaims;
            const numPaidClaims = data.numPaidClaims;

            $("#numBranches").html(numBranches);
            $("#numCompanies").html(numCompanies);
            
            // $("#numCorporateMembers").html(numCorporateMembers);
            // $("#numPersonalMembers").html(numPersonalMembers);

            $("#numCorporateMembers").html('400.000');
            $("#numPersonalMembers").html('300.000');
            
            $("#numProductsCorporate").html(productStats.numProductsCorporate);
            $("#numProductsRetail").html(productStats.numProductsRetail);
            
            $("#numClaims").html(numClaims);
            $("#numVerifyingClaims").html(numVerifyingClaims);
            $("#numVerifiedClaims").html(numVerifiedClaims);
            $("#numPaidClaims").html(numPaidClaims);

            var doughnutChart = document
                .getElementById("doughnutChart")
                .getContext("2d");

            var myDoughnutChart = new Chart(doughnutChart, {
                type: "doughnut",
                data: {
                    datasets: [
                        {
                            data: [numPaidClaims, numClaims],
                            backgroundColor: ["#ff9113", "#15a2fc"],
                        },
                    ],

                    labels: ["Jumlah Pembayaran", "Jumlah Klaim"],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: "bottom",
                    },
                    layout: {
                        padding: {
                            left: 20,
                            right: 20,
                            top: 20,
                            bottom: 20,
                        },
                    },
                },
            });            
        },
    });
});