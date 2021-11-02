@extends('master')
@section('content')
@include('page._headpage')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox ">
        <div class="ibox-title">
          <?php $CI = get_instance(); ?>
          @if($CI->session->flashdata('message_datawbp_error'))
          <div class="alert alert-danger col-md-12 alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <a class="alert-link" href="#"><?= $CI->session->flashdata('message_pengguna_success') ?></a>.
          </div>
          @elseif($CI->session->flashdata('message_datawbp_success'))
          <div class="alert alert-success col-md-12 alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <a class="alert-link" href="#"><?= $CI->session->flashdata('message_pengguna_success');  ?></a>.
          </div>
          @else
          @endif
          <h5>Data Warga Binaan Pemasyarakatan</h5>
          <div class="ibox-tools">
            <button class="btn btn-info " type="button" data-toggle="modal" data-target="#UploadExcel"><i class="fa fa-upload"></i> Upload WBP</button>
          </div>
        </div>
        <div class="ibox-content">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama WBP</th>
                  <th>Kejahatan</th>
                  <th>Tgl Registrasi</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                @foreach($datawbp as $dtwbp)
                <tr class="gradeX">
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $dtwbp->nama ?></td>
                  <td><?php echo $dtwbp->kejahatan ?></td>
                  <td class="center"><?php echo $dtwbp->tgl_masuk ?></td>
                  <td class="center">
                    <a class="btn btn-primary btn-rounded" href="#"><i class="fa fa-pencil"></i> Edit</a>
                    <a class="btn btn-warning btn-rounded" href="#"><i class="fa fa-eye"></i> Lihat</a>
                    <a class="btn btn-danger btn-rounded" href="#"><i class="fa fa-trash"></i> Hapus</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal inmodal" id="UploadExcel" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <h5 class="modal-title"> Upload Excel Data WBP</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="contact-box">
              <div class="row">
                <div class="col-12">
                  <form class="m-t" role="form" enctype="multipart/form-data" method="post" action="Proses/Import/Data-Wbp">
                    <div class="form-group">
                      <input type="file" class="form-control col-12" name="file"  placeholder="file Excel Data WBP">
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
      @endsection
