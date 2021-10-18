
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
<!-- SUMMERNOTE -->
<script src="<?php echo base_url('assets/js/plugins/summernote/summernote-bs4.js')?>"></script>
<script>
$(document).ready(function(){
  $('.summernote').summernote();
});
</script>
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

  var ctx = document.getElementById("myChart").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "September", "November", "Desember"],
      datasets: [{
        label: 'Pendaftar',
        data: [12, 19, 3, 5, 2, 3],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
});
</script>
