/**
 * Convert yyyy-mm-dd to dd-mm-yyyy format
 *
 * @param {string} sourceData
 *
 * @return {string}
 */
function dmcFormatDate(sourceDate) {
    const [year, month, day] = sourceDate.split("-");
    const result = [dmcPadToDigit(month), dmcPadToDigit(day), year].join("/");
    return result;
}

/**
 * Add zero to supplied string
 *
 * @param {string} num
 *
 * @return {string}
 */
function dmcPadToDigit(num) {
    return num.toString().padStart(2, "0");
}

/**
 * Format integer into delimited format
 *
 * @param {integer} num
 * @param {string}  delimiter
 *
 * @return {string}
 */
function dmcNumberFormat(num, delimiter = ".") {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, delimiter);
}

function number_format(
    number,
    decimals = ",",
    dec_point = ".",
    thousands_sep = "."
) {
    // Strip all characters but numerical ones.
    number = (number + "").replace(/[^0-9+\-Ee.]/g, "");
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
        dec = typeof dec_point === "undefined" ? "." : dec_point,
        s = "",
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return "" + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || "").length < prec) {
        s[1] = s[1] || "";
        s[1] += new Array(prec - s[1].length + 1).join("0");
    }
    return s.join(dec);
}

function get_time() {
    const d = new Date();
    return d.getTime();
}

var dmcFunctions = {
    formatDate: function (strDate) {
        var monthNames = [
            "Januari",
            "Pebruari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "Nopember",
            "Desember",
        ];

        var arrDate = strDate.split("-");

        var itemYear = arrDate[0];
        var itemMonth = arrDate[1];
        if (itemMonth.substr(0, 1) == "0") {
            itemMonth = itemMonth.substr(1, 1);
        }
        var itemDay = arrDate[2];

        var strResult = itemDay + " " + monthNames[itemMonth] + " " + itemYear;

        return strResult;
    },

    getKelurahan: function(kelurahanId){
        $.ajax({
            type: "GET",
            url: "/ajax/kelurahan/" + kelurahanId,
            beforeSend: function() {
                // todo:
            },
            success: function(data) { 
                if (parseInt(data.error) === 0){
                    let kelurahan = data.content;
                    return kelurahan;
                } else {
                    return 0;
                }
            }
        });
    },

    getFields: function (tbl) {
        switch(tbl){
            case 'mt_klinik':
                let arrFields = [
                    'id_mt_klinik',
                    'kode_klinik',
                    'nama_perusahaan',
                    'nama_singkat',
                    'nama_aplikasi',
                    'alamat',
                    'kota',
                    'propinsi',
                    'kode_pos',
                    'telpon',
                    'fax',
                    'nama_pimpinan',
                    'kontak_person',
                    'keterangan',
                    'logo',
                    'logo_small',
                    'html_title',
                    'tgl_registrasi',
                    'jenis_klinik',
                    'kelas_klinik',
                    'penyelenggara_klinik',
                    'notelp_humas',
                    'website',
                    'luas_tanah',
                    'luas_bangunan',
                    'surat_izin',
                    'nomor_izin',
                    'tanggal_izin',
                    'oleh_izin',
                    'sifat_izin',
                    'masa_berlaku',
                    'status_penyelenggara',
                    'akreditas_rs',
                    'pentahapan_akreditas',
                    'status_akreditas',
                    'tanggal_akreditas',
                    'jumlah_tt',
                    'perinatologi',
                    'kelas_vvip',
                    'kelas_vip',
                    'kelas_i',
                    'kelas_ii',
                    'kelas_iii',
                    'icu',
                    'picu',
                    'nicu',
                    'hcu',
                    'iccu',
                    'ruang_isolasi',
                    'ruang_ugd',
                    'ruang_bersalin',
                    'email',
                    'id_dc_kelurahan',
                    'id_dc_kecamatan',
                    'id_dc_kota',
                    'id_dc_negara',
                    'id_dc_propinsi',
                    'id_dd_paket',
                    'jenis_app',
                    'nomer_hp',
                    'jenis_pklu',
                    'tgl_input',            
                ];

                return arrFields;
                break;
            default:
                return '';
        }
    }
};

function dmcGetFields(tbl)
{

}