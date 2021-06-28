  	
<script src="<?= base_url('assets/vendor/chart.js/Chart.min.js');?>"></script>


<!-- konfigurasi pie chart -->
<script type="text/javascript">
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("pieChartJmlPeserta");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: [<?php for ($i=0 ; $i < $jml_komisariat; $i++) {
        echo '"'.$komisariat[$i]['nama_komisariat'].'", ';
      } ?>"Komisariat 1", "Komisariat 2", "Komisariat 3"],
   
   datasets: [{
      data: [<?php for ($i=0 ; $i < $jml_komisariat; $i++) {
        echo $jmlah_peserta_komisariat[$i].',';
      } ?>],
      backgroundColor: [<?php for ($i=0 ; $i < $jml_komisariat; $i++) {
        echo "'".$warna1[$i]."', ";
      } ?>],
      hoverBackgroundColor: [<?php for ($i=0 ; $i < $jml_komisariat; $i++) {
        echo "'".$warna2[$i]."', ";
      } ?>],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
</script>
<!-- akhir konfigurasi pie chart -->


<!-- konfigurasi bar chart (persentase jenis pelayanan) -->
<script>  
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ["Layanan Pengguna", "Layanan Informasi", "Layanan Perangkat"],
    datasets: [{
      label: "Jumlah ",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [<?= $jml_pelayanan[0].', '.$jml_pelayanan[1].', '.$jml_pelayanan[2]; ?>],
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 6
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?= $jml_tim+10; ?>,
          maxTicksLimit: 5,
          padding: 10,
          
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        
      }
    },
  }
});
</script>
<!-- akhir konfigurasi bar chart (persentase jenis pelayanan) -->

