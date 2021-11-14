@extends('master')
@section('content')
@include('page._headpage')
@foreach($user as $usr)
@if($usr->no_identitas == $_SESSION['no_identitas'])
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-6">
      <div class="contact-box">
        <div class="row">
          <div class="col-4">
            <div class="text-center">
              <img alt="image" class="rounded-circle circle-border m-b-md" src="<?= base_url('assets/images/'.$usr->photo)?>" height="120px">
              <div class="m-t-xs font-bold"><?= $usr->no_identitas ?></div>
            </div>
          </div>
          <div class="col-8">
            <h3><strong><?= $usr->nama ?></strong></h3>
            <br>
            <textarea class="form-control col-12" placeholder="Alamat"><?= $usr->alamat ?></textarea>
            <br>
            <input type="number" class="form-control col-12" placeholder="Nomor Handphone" value="<?= $usr->no_handphone ?>">
            <br>
            <input type="email" class="form-control col-12" placeholder="Email" value="<?= $usr->email ?>">
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="contact-box">
        <div class="row">
          <div class="col-12">
            <div class="text-center">
              <img alt="image" class="feed-photo" width="380px" src="<?= base_url('assets/images/'.$usr->scan_identitas)?> ">
              <div class="m-t-xs font-bold">Identitas : <?= $usr->nama ?></div>
              <br>
              <button type="button" class="btn btn-primary">Simpan Perubahan</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif
@endforeach

@endsection
