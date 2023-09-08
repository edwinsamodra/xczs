var xValues = ["Klaim Asuransi", "Klaim BPJS", "Klaim Perusahaan", "Klaim Dalam Proses Verifikasi"];
    var yValues = [55, 49, 44, 24];
    var barColors = [
      "#b91d47",
      "#00aba9",
      "#2b5797",
      "#e8c3b9"
    ];
    
    new Chart("myChart", {
      type: "pie",
      data: {
        labels: xValues,
        datasets: [{
          backgroundColor: barColors,
          data: yValues
        }]
      },
      options: {
        title: {
          display: true,
          text: "Data Kunjungan"
        }
      }
    });