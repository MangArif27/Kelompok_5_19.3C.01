@extends('master')
@section('content')
@include('page._headpage')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox">
        <div class="ibox-title">
          <h5>Tentang Aplikasi Sistem Informasi Layanan Pemasyarakatan</h5>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="contact-box">
        <div class="row">
          <div class="col-12">
            <input type="text" class="form-control col-12" placeholder="Nama Aplikasi">
            <br>
            <input type="text" class="form-control col-12" placeholder="Nama Unit Pelaksana Teknis">
            <br>
            <textarea class="form-control col-12" placeholder="Alamat"></textarea>
            <br>
            <input type="number" class="form-control col-12" placeholder="Nomor Handphone">
            <br>
            <input type="email" class="form-control col-12" placeholder="Email">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-8">
      <div class="contact-box">
          <div class="col-lg-12">
            <div class="ibox ">
              <div class="ibox-content no-padding">
                <div class="summernote">
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  @endsection
