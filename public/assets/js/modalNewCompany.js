/* modal cabang */
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

const baseUrl = $('meta[name="base-url"]').attr("content");

// LISTBOX PROPINSI

function simpanDataPerusahaan(
    idPerusahaan,
    txtNamaPerusahaan,
    txtPimpinan,
    idKelurahan,
    txtKodePos,
    txtKodePerusahaan,
    txtKodeAsuransi,
    txtAlamat,
    txtKota,
    txtTelepon1,
    txtTelepon2,
    txtKontakPerson1,
    txtKontakPerson2,
    txtHP,
    txtTglDaftar,
    txtNoKontrak,
    txtTglKontrak,
    txtTglNIB,
    txtAlamatTagihan,
    txtJenisKerjasama,
    logo,
    // paketAsuransi
) {
    const formData = new FormData($("form")[0]);

    formData.append("frmDataPerusahaan_id", idPerusahaan);
    formData.append("nama_perusahaan", txtNamaPerusahaan);
    formData.append("kode_perusahaan", txtKodePerusahaan);
    formData.append("kode_asuransi", txtKodeAsuransi);
    formData.append("nama_pimpinan_perusahaan", txtPimpinan);
    formData.append("id_dc_kelurahan", idKelurahan);
    formData.append("kodepos", txtKodePos);
    formData.append("alamat", txtAlamat);
    formData.append("kota", txtKota);
    formData.append("telpon1", txtTelepon1);
    formData.append("telpon2", txtTelepon2);
    formData.append("kontakperson", txtKontakPerson1);
    formData.append("kontakperson2", txtKontakPerson2);
    formData.append("hp", txtHP);
    formData.append("tgl_daftar", txtTglDaftar);
    formData.append("no_kontrak", txtNoKontrak);
    formData.append("tgl_kontrak", txtTglKontrak);
    formData.append("tgl_nib", txtTglNIB);
    formData.append("alamat_tagihan", txtAlamatTagihan);
    formData.append("jenis_kerjasama", txtJenisKerjasama);
    formData.append("logo", logo);

    // formData.append("paket_asuransi", paketAsuransi);

    $.ajax({
        type: "POST",
        url: "/mitrausaha",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {},
        success: function (data) {
            Swal.fire({
                title: "Info!",
                text: "Data telah disimpan",
                icon: "success",
                confirmButtonText: "Tutup",
                target: "#modalTambahDataPerusahaan",
            }).then(
                function (isConfirm) {
                    if (isConfirm) {
                        location.reload(true);
                    }
                },
                function () {
                    // todo
                }
            );
        },
    });
}

class Table {
    constructor() {
        // check list of package (ajax)
    }
}


// $(document).on("click", "button.btnDeletePaketPerusahaan.btn.btn-sm.btn-info", function () {
//         let numRows = $("#tblDaftarPaketPerusahaan tbody tr").length;
//         let rowNumber = $(this).data("row");
//         $("#tblDaftarPaketPerusahaan tbody tr[data-rownum='" + rowNumber + "']").remove();
//     }
// );


$(document).ready(function () {
    // $("#btnTambahPaketPerusahaan").click(function () {
    //     let paketAsuransi_value = $("#lstPaketAsuransi").find(":selected").val();
    //     var paketAsuransi_text = $("#lstPaketAsuransi").find(":selected").text();

    //     if (parseInt(paketAsuransi_value) > 0) {
    //         let numRows = $("#tblDaftarPaketPerusahaan tbody tr").length;
    //         let rowNumber = parseInt(numRows) + 1;

    //         // check similar
    //         let numSimilarId = $('#tblDaftarPaketPerusahaan tr[data-id="' + paketAsuransi_value + '"]').length;

    //         if (numSimilarId > 0) {
    //             Swal.fire({
    //                 title: "Info!",
    //                 text: "Paket yang sama sudah ada di daftar",
    //                 icon: "success",
    //                 confirmButtonText: "Tutup",
    //                 target: "#modalTambahDataPerusahaan",
    //             });
    //         } else {
    //             let row = "<tr data-class='paket-asuransi' data-rownum='" + rowNumber + "' data-id='" + paketAsuransi_value + "'><td>" + paketAsuransi_text + "</td><td class='d-flex justify-content-end'><button type='button' data-row='" + rowNumber + "' class='btnDeletePaketPerusahaan btn btn-sm btn-info'><i class='fa fa-xmark' aria-hidden='true'></i> Hapus</button></td></tr>";
    //             $("#tblDaftarPaketPerusahaan tbody").append(row);
    //         }
    //     } else {
    //         Swal.fire({
    //             title: "Info!",
    //             text: "Anda belum memilih paket yang akan ditambahkan",
    //             icon: "success",
    //             confirmButtonText: "Tutup",
    //             target: "#modalTambahDataPerusahaan",
    //         });
    //     }
    // });


    $(".linkEdit").click(function () {
        const minCount = 2; // jumlah karakter minimal
        var keyupCount = 0;

        const idPerusahaan = $(this).data("id");
        const companyCode = $(this).data("companycode");

        $("#modalInputLabel").html("Edit Data Perusahaan");
        $("#frmDataPerusahaan_action").val("update");
        $("#frmDataPerusahaan_id").val(idPerusahaan);

        $.ajax({
            type: "GET",
            url: "/ajax/products",
            beforeSend: function () {},
            success: function (data) {
                if (parseInt(data.error) == 0) {
                    let products = data.products;
                    $("#lstPaketAsuransi").empty();
                    $("#lstPaketAsuransi").append(
                        '<option value="0">-- Pilih Paket Asuransi --</option>'
                    );
                    $.each(products, function (index, product) {
                        $("#lstPaketAsuransi").append(
                            '<option value="' +
                                product.kl_paket +
                                '">' +
                                product.nama_paket_asuransi +
                                "</option>"
                        );
                    });
                }
            },
        });

        let payload = {
            companycode: companyCode,
        };

        $.ajax({
            type: "GET",
            url: "/ajax/company/packages",
            data: payload,
            beforeSend: function () {},
            success: function (data) {
                if (parseInt(data.error) == 0) {
                    let content = data.content;
                    let numContent = content.length;

                    $("#tblDaftarPaketPerusahaan tbody").empty();

                    if (parseInt(numContent) > 0) {
                        let rowNumber = 1;
                        $.each(content, function (index, paket) {
                            let row = "<tr data-class='paket-asuransi' data-rownum='" + rowNumber + "' data-id='" + paket.kl_paket + "'><td>" + paket.nama_paket_asuransi + "</td><td class='d-flex justify-content-end'><button type='button' data-row='" + rowNumber + "' class='btnDeletePaketPerusahaan btn btn-sm btn-info'><i class='fa fa-xmark' aria-hidden='true'></i> Hapus</button></td></tr>";
                            $("#tblDaftarPaketPerusahaan tbody").append(row);
                            rowNumber++;
                        });
                    }
                }
            },
        });

        // send ajax request
        $.ajax({
            type: "GET",
            url: "/mitrausaha/" + idPerusahaan,
            beforeSend: function () {
                // $("#disease-search").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function (data) {
                $("#txtNamaPerusahaan").val(data.nama_perusahaan);
                $("#txtKodePerusahaan").val(data.kode_perusahaan);
                $("#txtPimpinan").val(data.nama_pimpinan_perusahaan);

                const idKelurahan = data.id_dc_kelurahan;

                $("#txtidkelurahan").val(idKelurahan);
                $("#txtAlamat").val(data.alamat);
                $("#txtKodePos").val(data.kode_pos);
                $("#txtKota").val(data.kota);
                $("#txtTelepon1").val(data.telpon1);
                $("#txtTelepon2").val(data.telpon2);
                $("#txtKontakPerson1").val(data.kontakperson);
                $("#txtKontakPerson2").val(data.kontakperson2);
                $("#txtHP").val(data.hp);
                $("#txtFax").val(data.fax);

                if (data.tgl_daftar == null) {
                } else {
                    var date = data.tgl_daftar.split(" ");
                    var date1 = date[0];
                    $("#txtTglDaftar").val(date1);
                }

                if (data.tgl_nib == null) {
                } else {
                    var date = data.tgl_nib.split(" ");
                    var datenib1 = date[0];
                    $("#txtTglNIB").val(datenib1);
                }

                if (data.tgl_kontrak == null) {
                } else {
                    var date = data.tgl_kontrak.split(" ");
                    var datekontrak1 = date[0];
                    $("#txtTglKontrak").val(datekontrak1);
                }

                $("#txtNomNIB").val(data.nomer_nib);
                $("#txtNoKontrak").val(data.no_kontrak);

                $("#txtJenisPerusahan").val(data.jenis_perusahaan);
                $("#txtKodeGroup").val(data.kode_group);
                $("#txtAlamatTagihan").val(data.alamat_tagihan);
                $("#txtJenisKerjasama").val(data.jenis_kerjasama);
                $("#logo").prop("files")[0];

                $('#lnk_modalTambahDataPerusahaan_previewLogo').data("image", data.logo_perusahaan);

                $.ajax({
                    type: "GET",
                    url: "/wilayah/kelurahan/" + idKelurahan,
                    dataType: "json",
                    beforeSend: function () {
                        // todo:
                    },
                    success: function (data) {
                        $("#txtKodePos").val(data[0].kode_pos);
                        $("#txtKelurahan").val(data[0].nama);
                        $("#txtKecamatan").val(data[0].nama_kecamatan);
                        $("#txtKota").val(data[0].nama_kota);
                    },
                });
            },
        });

        $("#modalTambahDataPerusahaan").modal("show");
    });


    $("#btnNewCompanySubmit").click(function () {
        const idPerusahaan = $("#frmDataPerusahaan_id").val();

        const txtNamaPerusahaan = $("#txtNamaPerusahaan").val();
        const txtPimpinan = $("#txtPimpinan").val();
        const txtKodePerusahaan = $("#txtKodePerusahaan").val();
        const txtKodeAsuransi = $("#txtKodeAsuransi").val();

        const idKelurahan = $("#txtidkelurahan").val();
        const txtAlamat = $("#txtAlamat").val();
        const txtKodePos = $("#txtKodePos").val();
        const txtKota = $("#txtKota").val();

        const txtTelepon1 = $("#txtTelepon1").val();
        const txtTelepon2 = $("#txtTelepon2").val();

        const txtKontakPerson1 = $("#txtKontakPerson1").val();
        const txtKontakPerson2 = $("#txtKontakPerson2").val();

        const txtHP = $("#txtHP").val();

        const txtTglDaftar = $("#txtTglDaftar").val();

        const txtNoKontrak = $("#txtNoKontrak").val();
        const txtTglKontrak = $("#txtTglKontrak").val();

        const txtTglNIB = $("#txtTglNIB").val();

        const txtAlamatTagihan = $("#txtAlamatTagihan").val();
        const txtJenisKerjasama = $("#txtJenisKerjasama").val();
        const logo = $("#logo").prop("files")[0];

        // let listPaket = $('#tblDaftarPaketPerusahaan tbody tr[data-class="paket-asuransi"]');

        // let pilihanPaket = "";
        // $.each(listPaket, function (index, paket) {
        //     pilihanPaket += $(paket).data("id") + ",";
        // });

        // let paketAsuransi = pilihanPaket.substring(0, pilihanPaket.length - 1);

        Swal.fire({
            title: "Apakah data yang anda input sudah benar?",
            text: "Pastikan data yang anda input sudah benar",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            target: "#modalTambahDataPerusahaan",
        }).then((result) => {
            if (result.isConfirmed) {
                simpanDataPerusahaan(
                    idPerusahaan,
                    txtNamaPerusahaan,
                    txtPimpinan,
                    idKelurahan,
                    txtKodePos,
                    txtKodePerusahaan,
                    txtKodeAsuransi,
                    txtAlamat,
                    txtKota,
                    txtTelepon1,
                    txtTelepon2,
                    txtKontakPerson1,
                    txtKontakPerson2,
                    txtHP,
                    txtTglDaftar,
                    txtNoKontrak,
                    txtTglKontrak,
                    txtTglNIB,
                    txtAlamatTagihan,
                    txtJenisKerjasama,
                    logo,
                    // paketAsuransi
                );                
            }
        });

    });


    $(".linkDelete").click(function () {
        const idPerusahaan = $(this).data("id");

        bootbox.confirm({
            title: "Data Perusahaan",
            message: "Yakin hapus data perusahaan?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Batal',
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Ya',
                },
            },
            callback: function (result) {
                if (result === true) {
                    $.ajax({
                        type: "POST",
                        url: "/mitrausaha/delete",
                        data: {
                            id: idPerusahaan,
                        },
                        beforeSend: function () {
                            // todo:
                        },
                        success: function (response) {
                            if (response.error === 0) {
                                iconStr = "success";
                            } else {
                                iconStr = "error";
                            }

                            Swal.fire({
                                title: "Info!",
                                text: response.message,
                                icon: iconStr,
                                confirmButtonText: "Tutup",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload(true);
                                }
                            });
                        },
                    });
                }
            },
        });
    });


    $("#btnTambahDataPerusahaan").click(function () {
        $("#modalInputLabel").html("Tambah Data Perusahaan");
        $("#frmDataPerusahaan_action").val("add");
        $("#frmDataPerusahaan_id").val(0);

        // ambil data paket asuransi
        $.ajax({
            type: "GET",
            url: "/ajax/products",
            beforeSend: function () {},
            success: function (data) {
                if (parseInt(data.error) == 0) {
                    let products = data.products;
                    $("#lstPaketAsuransi").empty();
                    $("#lstPaketAsuransi").append(
                        '<option value="0">-- Tambah Paket Asuransi --</option>'
                    );
                    $.each(products, function (index, product) {
                        $("#lstPaketAsuransi").append(
                            '<option value="' +
                                product.kl_paket +
                                '">' +
                                product.nama_paket_asuransi +
                                "</option>"
                        );
                    });
                }
            },
        });

        $("#modalTambahDataPerusahaan").modal("show");
        $("#formPerusahaan").trigger("reset");
    });

    const minCount = 2; // jumlah karakter minimal
    var keyupCount = 0;

    $("#txtKelurahan").keyup(function () {
        keyupCount++;
        if (keyupCount > minCount) {
            $.ajax({
                type: "GET",
                url: "/wilayah/list/kelurahan/",
                data: "keyword=" + $(this).val(),
                beforeSend: function () {},
                success: function (data) {
                    if (data.status == "OK") {
                        $("#kelurahan-list").html(data.content);
                        $("#kelurahan-list").show();
                    }
                },
            });
        }
    });


    $(document).on("click", ".list-item", function (event) {
        const dataId = $(this).attr("data-id");
        $("#txtKelurahanid").val(dataId);
        $("#kelurahan-list").hide();
        $.ajax({
            type: "GET",
            url: "/wilayah/kelurahan/" + dataId,
            beforeSend: function () {},
            success: function (data) {
                const idKelurahan = dataId;

                $("#txtKelurahan").val(data[0].nama);
                $("#txtKodePos").val(data[0].kode_pos);
                $("#txtidkelurahan").val(idKelurahan);
                $("#txtKecamatan").val(data[0].nama_kecamatan);
                $("#txtKota").val(data[0].nama_kota);
            },
        });
    });


    $("#lnk_modalTambahDataPerusahaan_previewLogo").click(function () {
        let logoPerusahaan = $(this).data("image");

        if (typeof logoPerusahaan === 'string' && logoPerusahaan.length === 0) {
            logoPerusahaan = "assets/images/default-logo.png";
        }

        Swal.fire({
            title: "",
            text: "",
            imageUrl: logoPerusahaan,
            // imageWidth: 400,
            imageHeight: 200,
            imageAlt: "Logo Perusahaan",
            target: "#modalTambahDataPerusahaan",
        });
    });
});
