@extends('master')
@section('content')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12" align="center" >
      <div class="ibox ">
        <div class="col-sm-6 b-r" >
          <div class="m-b-md">
            <img alt="image" src="<?php echo base_url('assets/img/angular_logo.png')?>">
          </div>
          <h4>Silahkan Masukan Kode Ticket Anda !</h4>
          <form class="" role="form" action="index.html">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Masukan Kode Ticket Disini" required="">
            </div>
            <button type="submit" class="btn btn-primary block">Cari</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
