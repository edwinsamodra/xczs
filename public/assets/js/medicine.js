function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}

$(document).ready(function(){
    const minCount = 1; // jumlah karakter minimal
    var keyupCount = 0;

    $("#medicine-search2").keyup(function() {
        keyupCount++;
        if (keyupCount > minCount)
        {
            $.ajax({
                type: "GET",
                url: "/ajax/medicine/search",
                data: 'keyword=' + $(this).val(),
                beforeSend: function() {
                    // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                },
                success: function(data) {
                    if (data.status == 'OK'){
                        // show
                        const item = data.medicine[0];

                        const merk = item.merk;
                        const generik = item.generik;
                        const detail = item.detail;
                        const namaSubGolongan = item.nama_sub_golongan;
                        const namaGolongan = item.nama_golongan;
                        const namaPabrik = item.nama_pabrik;

                        $('#lblMerk').html(merk);
                        $('#lblGenerik').html(generik);
                        $('#lblDetail').html(detail);
                        $('#lblNamaSubGolongan').html(namaSubGolongan);
                        $('#lblNamaGolongan').html(namaGolongan);
                        $('#lblNamaPabrik').html(namaPabrik);

                        const records = data.medicine;

                        $('#tblMedicineDetail tbody').html('');

                        $.each(records, function(idx, record){
                            var recMerk = record.merk;
                            var recKemasan = record.kemasan;
                            var recKandungan = record.kandungan;
                            var intHarga = parseInt(record.harga);
                            var recHarga = intHarga.toLocaleString('us', {minimumFractionDigits: 2, maximumFractionDigits: 2});

                            var row = '<tr><td style="color: white"><strong>' 
                                + recMerk + '</strong></td><td><strong style="color: white">' 
                                + recKemasan + '</strong></td><td><strong style="color: white">' 
                                + recKandungan + '</strong></td><td><strong style="color: white">' 
                                + recHarga + '</strong></td></tr>';

                            $('#tblMedicineDetail > tbody').append(row);
                        });
                    }
                }
            });
        }
    });


    $("#medicine-search").keyup(function() {
        keyupCount++;
        if (keyupCount > minCount){
            $.ajax({
                type: "GET",
                url: "/ajax/medicine/search",
                data: 'keyword=' + $(this).val(),
                beforeSend: function() {
                    // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
                },
                success: function(data) {
                    console.log(data);
                    if (data.status == 'OK'){
                        $('#suggestion-box').html(data.content);
                        $('#suggestion-box').show();
                    }
                }
            });
        }
    });
});


$(document).on('click', '.list-item', function(event) {
    console.log('LIST ITEM CLICKED');
    const dataId = $(this).attr('data-id');
    $('#medicine-id').val(dataId);
    $('#suggestion-box').hide();
    $.ajax({
        type: "GET",
        url: "/ajax/medicine/detail/" + dataId,
        beforeSend: function() {
            // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
        },
        success: function(data) { 
            if (data.status == 'OK'){
                console.log("AJAX success return status OK");
                $('#mainTabContainerObat').css("visibility", "visible");
            
                const item = data.medicines[0];
                console.log(item);

                $('#lblMerk').html(item.merk);
                $('#lblGenerik').html(item.generik); // category
                $("#lblDetail").html(item.detail);
                $('#lblNamaSubGolongan').html(item.nama_sub_golongan); // Diagnosa sesuai ICD-10
                $('#lblNamaGolongan').html(item.nama_golongan);
                $('#lblNamaPabrik').html(item.nama_pabrik);

                const records = data.medicines;
                $('#tblMedicineDetail tbody').html('');

                $.each(records, function(idx, record){
                    var recMerk = record.merk;
                    var recKemasan = record.kemasan;
                    var recKandungan = record.kandungan;
                    var intHarga = parseInt(record.harga);
                    var recHarga = intHarga.toLocaleString('id');

                    var row = '<tr><td><strong>' 
                        + recMerk + '</strong></td><td><strong>' 
                        + recKemasan + '</strong></td><td><strong>' 
                        + recKandungan + '</strong></td><td><strong>' 
                        + recHarga + '</strong></td></tr>';

                    $('#tblMedicineDetail > tbody').append(row);
                });
            } else {
                // todo: action
                console.log('STATUS NOT OK');
            }
        }
    });
});

$(document).on("mouseover", ".list-item", function(event){
    $(this).css("background-color", "#0c5795");
    $(this).css("color", "white");
});

$(document).on("mouseout", ".list-item", function(event){
    $(this).css("background-color", "#F6F8FA");
    $(this).css("color", "black");
});