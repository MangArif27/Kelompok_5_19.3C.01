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
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="col-md-10" alt="image" src="<?php echo base_url('assets/img/angular_logo.png')?>">
              </div>
              <div class="carousel-item">
                <img class="col-md-10" alt="image" src="<?php echo base_url('assets/img/meteor_logo.png')?>">
              </div>
              <div class="carousel-item">
                <img class="col-md-10" alt="image" src="<?php echo base_url('assets/img/starter_logo.jpg')?>">
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
      <h4>Silahkan Masukan Kode Ticket Anda !</h4>
      <form class="col-md-6" role="form" action="index.html">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Masukan Kode Ticket Disini" required="">
        </div>
        <button type="submit" class="btn btn-primary block">Cari</button>
      </form>
    </div>
  </div>
</div>
@endsection
