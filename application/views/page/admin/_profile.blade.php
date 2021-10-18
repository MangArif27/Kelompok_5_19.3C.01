@extends('master')
@section('content')
@include('page._headpage')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-6">
      <div class="contact-box">
        <div class="row">
          <div class="col-4">
            <div class="text-center">
              <img alt="image" class="rounded-circle circle-border m-b-md" src="<?php echo base_url('assets/img/a2.jpg')?> ">
              <div class="m-t-xs font-bold">123456798</div>
            </div>
          </div>
          <div class="col-8">
            <h3><strong>John Smith</strong></h3>
            <br>
            <textarea class="form-control col-12" placeholder="Alamat"></textarea>
            <br>
            <input type="number" class="form-control col-12" placeholder="Nomor Handphone">
            <br>
            <input type="email" class="form-control col-12" placeholder="Email">
            <br>
            <input type="password" class="form-control col-12" placeholder="Password">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="contact-box">
        <div class="row">
          <div class="col-12">
            <div class="text-center">
              <img alt="image" class="feed-photo" width="370px" src="<?php echo base_url('assets/img/ktp.png')?> ">
              <div class="m-t-xs font-bold">Identitas : Muarif Zamzam Nur</div>
              <br>
              <button type="button" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
