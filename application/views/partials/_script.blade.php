
<!-- Mainly scripts -->
<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js')?>"></script>
<script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js')?>"></script>
<script src="<?php echo base_url('assets/js/plugins/slimscroll/jquery.slimscroll.min.js')?>"></script>

<!-- Flot -->
<script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.js')?>"></script>
<script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.tooltip.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.spline.js')?>"></script>
<script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.resize.js')?>"></script>
<script src="<?php echo base_url('assets/js/plugins/flot/jquery.flot.pie.js')?>"></script>

<!-- Peity -->
<script src="<?php echo base_url('assets/js/plugins/peity/jquery.peity.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/demo/peity-demo.js')?>"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets/js/inspinia.js')?>"></script>
<script src="<?php echo base_url('assets/js/plugins/pace/pace.min.js')?>"></script>

<!-- jQuery UI -->
<script src="<?php echo base_url('assets/js/plugins/jquery-ui/jquery-ui.min.js')?>"></script>

<!-- GITTER -->
<script src="<?php echo base_url('assets/js/plugins/gritter/jquery.gritter.min.js')?>"></script>

<!-- Sparkline -->
<script src="<?php echo base_url('assets/js/plugins/sparkline/jquery.sparkline.min.js')?>"></script>

<!-- Sparkline demo data  -->
<script src="<?php echo base_url('assets/js/demo/sparkline-demo.js')?>"></script>

<!-- ChartJS-->
<script src="<?php echo base_url('assets/js/plugins/chartJs/Chart.min.js')?>"></script>

<!-- Toastr -->
<script src="<?php echo base_url('assets/js/plugins/toastr/toastr.min.js')?>"></script>
<!-- Table -->
<script src="<?php echo base_url('assets/js/plugins/dataTables/datatables.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/plugins/dataTables/dataTables.bootstrap4.min.js')?>"></script>
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'excel', title: 'Daftar Pengguna Sistem Informasi Layanan Pemasyarakatan'},
                {extend: 'pdf', title: 'Daftar Pengguna Sistem Informasi Layanan Pemasyarakatan'},
            ]

        });

    });

</script>

<script>
$(document).ready(function() {
  setTimeout(function() {
    toastr.options = {
      closeButton: true,
      progressBar: true,
      showMethod: 'slideDown',
      timeOut: 4000
    };
    toastr.success('Selamat Datang di Layanan Keluarga WBP');

  }, 1300);


  var data1 = [
    [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
  ];
  var data2 = [
    [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
  ];
  $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
    data1, data2
  ],
  {
    series: {
      lines: {
        show: false,
        fill: true
      },
      splines: {
        show: true,
        tension: 0.4,
        lineWidth: 1,
        fill: 0.4
      },
      points: {
        radius: 0,
        show: true
      },
      shadowSize: 2
    },
    grid: {
      hoverable: true,
      clickable: true,
      tickColor: "#d5d5d5",
      borderWidth: 1,
      color: '#d5d5d5'
    },
    colors: ["#1ab394", "#1C84C6"],
    xaxis:{
    },
    yaxis: {
      ticks: 4
    },
    tooltip: false
  }
);

var doughnutData = {
  labels: ["App","Software","Laptop" ],
  datasets: [{
    data: [300,50,100],
    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
  }]
} ;


var doughnutOptions = {
  responsive: false,
  legend: {
    display: false
  }
};


var ctx4 = document.getElementById("doughnutChart").getContext("2d");
new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

var doughnutData = {
  labels: ["App","Software","Laptop" ],
  datasets: [{
    data: [70,27,85],
    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
  }]
} ;


var doughnutOptions = {
  responsive: false,
  legend: {
    display: false
  }
};


var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

});
</script>
<script>
        $(document).ready(function() {

            var sparklineCharts = function(){
                $("#sparkline1").sparkline([34, 43, 43, 35, 44, 32, 44, 52], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1ab394',
                    fillColor: "transparent"
                });

                $("#sparkline2").sparkline([32, 11, 25, 37, 41, 32, 34, 42], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1ab394',
                    fillColor: "transparent"
                });

                $("#sparkline3").sparkline([34, 22, 24, 41, 10, 18, 16,8], {
                    type: 'line',
                    width: '100%',
                    height: '50',
                    lineColor: '#1C84C6',
                    fillColor: "transparent"
                });
            };
            var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,20],[11,10],[12,13],[13,4],[14,7],[15,8],[16,12]
            ];
            var data2 = [
                [0,0],[1,2],[2,7],[3,4],[4,11],[5,4],[6,2],[7,5],[8,11],[9,5],[10,4],[11,1],[12,5],[13,2],[14,5],[15,2],[16,0]
            ];
            $("#flot-dashboard5-chart").length && $.plot($("#flot-dashboard5-chart"), [
                        data1,  data2
                    ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,

                            borderWidth: 2,
                            color: 'transparent'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis:{
                        },
                        yaxis: {
                        },
                        tooltip: false
                    }
            );

        });
    </script>
