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
            @foreach($about as $abt)
            <form class="m-t" role="form" enctype="multipart/form-data" method="post" action="Proses/Update/Tentang-Aplikasi/<?= $abt->id_upt; ?>">
              <div class="form-group">
                <input type="text" class="form-control col-12" name="Nama_Apk" placeholder="Nama Aplikasi" value="<?= $abt->nama_apk; ?>">
              </div>
              <div class="form-group">
                <input type="number" class="form-control col-12" name="Id_Upt" value="<?= $abt->id_upt; ?>" readonly placeholder="Id Upt">
              </div>
              <div class="form-group">
                <input type="text" class="form-control col-12" name="Nama_Upt" placeholder="Nama Unit Pelaksana Teknis" value="<?= $abt->nama_upt; ?>">
              </div>
              <div class="form-group">
                <textarea class="form-control col-12" name="Alamat" placeholder="Alamat"><?= $abt->alamat; ?></textarea>
              </div>
              <div class="form-group">
                <input type="text" class="form-control col-12" name="No_Telp" value="<?= $abt->no_tlp; ?>" placeholder="Nomor Telphon">
              </div>
              <div class="form-group">
                <input type="email" class="form-control col-12" name="Email"value="<?= $abt->email; ?>" placeholder="Email">
              </div>
              <div class="form-group">
                <input type="text" class="form-control col-12" name="Website" value="<?= $abt->website; ?>" placeholder="Website">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="ibox">
          <div class="col-lg-12">
            <div class="ibox-title">
              <div class="ibox-content no-padding">
                <textarea name="summernote" class="summernote">{{ $abt->tentang_apk }}</textarea>
                @endforeach
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </form>
  </div>
</div>
@endsection
