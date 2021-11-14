<div class="row">
  <div class="col-lg-3">
    <div class="widget style1 yellow-bg">
      <div class="row">
        <div class="col-4">
          <i class="fa fa-user-o fa-5x"></i>
        </div>
        <div class="col-8 text-right">
          <span> Jumlah Pengguna</span>
          <?php
          $CI = get_instance();
          $today=date("Y-m-d");
          $tomorrow = date("Y-m-d", strtotime("+1 day"));
          $Level="User";
          $count_user=$CI->db->query("SELECT * FROM user WHERE  level='$Level'")->num_rows();
          $count_wbp=$CI->db->query("SELECT * FROM datawbp")->num_rows();
          $count_today=$CI->db->query("SELECT * FROM layanan WHERE  tgl_pelaksanaan='$today'")->num_rows();
          $count_tomorrow=$CI->db->query("SELECT * FROM layanan WHERE  tgl_pelaksanaan='$tomorrow'")->num_rows();
          ?>
          <h2 class="font-bold">0<?= $count_user; ?> </h2>

        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="widget style1 lazur-bg">
      <div class="row">
        <div class="col-4">
          <i class="fa fa-user-o fa-5x"></i>
        </div>
        <div class="col-8 text-right">
          <span> Jumlah WBP</span>
          <h2 class="font-bold">0<?= $count_wbp; ?></h2>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="widget style1 navy-bg">
      <div class="row">
        <div class="col-4">
          <i class="fa fa-drivers-license fa-5x"></i>
        </div>
        <div class="col-8 text-right">
          <span> Pendaftar Hari Ini</span>
          <h2 class="font-bold"><?= $count_today; ?> </h2>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3">
    <div class="widget style1 red-bg">
      <div class="row">
        <div class="col-4">
          <i class="fa fa-drivers-license fa-5x"></i>
        </div>
        <div class="col-8 text-right">
          <span> Pendaftar Besok</span>
          <h2 class="font-bold"><?= $count_tomorrow; ?> </h2>
        </div>
      </div>
    </div>
  </div>
</div>
