@extends('master')
@section('content')
<div class="row">
  <div class="col-lg-12" align="center">
    <div class="ibox ">
      <div class="ibox-content">
        <div class="col-md-12">
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="col-md-10" alt="image" src="<?php echo base_url('assets/images/slide/Slide1.png')?>" height="150px">
              </div>
              <div class="carousel-item">
                <img class="col-md-10" alt="image" src="<?php echo base_url('assets/images/slide/Slide2.jpg')?>" height="150px">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>
      </div>
      <?php $CI = get_instance(); ?>
      @if($CI->session->flashdata('message_tiket_error'))
      <div class="alert alert-danger col-md-12 alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <a class="alert-link" href="#"><?= $CI->session->flashdata('message_tiket_error') ?></a>.
      </div>
      @elseif($CI->session->flashdata('message_tiket_success'))
      <div class="alert alert-success col-md-12 alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <a class="alert-link" href="#"><?= $CI->session->flashdata('message_tiket_success');  ?></a>.
      </div>
      @else
      @endif
      <h4>Silahkan Masukan Kode Ticket Anda !</h4>
      <form class="col-md-6" role="form" action="Proses/Search/Tiket-Layanan" method="post">
        <div class="form-group">
          <input type="text" class="form-control" name="tiket" placeholder="Masukan Kode Ticket Disini" required="">
        </div>
        <button type="submit" class="btn btn-primary block">Cari</button>
      </form>
    </div>
  </div>
</div>
@endsection
