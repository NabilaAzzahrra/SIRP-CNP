<script>
  $(function () {

    var areaChartData = {
      labels  : ['Oktober', 'November', 'Desember','January', 'February', 'March', 'April', 'May', 'June', 'July','Agustus', 'September'],
      datasets: [
        {
          label               : 'Lolos Test',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?= count($okt); ?>,<?= count($nov); ?>,<?= count($des); ?>,<?= count($jan); ?>,<?= count($feb); ?>,<?= count($mar); ?>,<?= count($apr); ?>,<?= count($me); ?>,<?= count($jun); ?>,<?= count($jul); ?>,<?= count($agu); ?>,<?= count($sep); ?>]
        },
        {
          label               : 'Permintaan',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [<?= count($oktober); ?>,<?= count($november); ?>,<?= count($desember); ?>,<?= count($januari); ?>,<?= count($februari); ?>,<?= count($maret); ?>,<?= count($april); ?>,<?= count($mei); ?>,<?= count($juni); ?>,<?= count($juli); ?>,<?= count($agustus); ?>,<?= count($september); ?>]
        },
        {
          label               : 'Kandidat',
          backgroundColor     : 'rgba(244, 205, 50, 1)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#c1c7d1',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [<?= count($ok); ?>,<?= count($no); ?>,<?= count($de); ?>,<?= count($j); ?>,<?= count($f); ?>,<?= count($m); ?>,<?= count($a); ?>,<?= count($mee); ?>,<?= count($juu); ?>,<?= count($jull); ?>,<?= count($ag); ?>,<?= count($se); ?>]
        },
      ]
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })

  })
</script>

