@extends('master')
@section('content')
@include('page._headpage')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox ">
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
        <div class="ibox-title">
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
                  <td><?php echo $dtwbp->nama_wbp_wbp ?></td>
                  <td><?php echo $dtwbp->kejahatan ?></td>
                  <td class="center"><?php echo $dtwbp->tgl_masuk ?></td>
                  <td class="center">
                    <button class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#EditWBP<?php echo $dtwbp->no_induk ?>"><i class="fa fa-pencil"></i> Edit</button>
                    <div class="modal inmodal" id="EditWBP<?php echo $dtwbp->no_induk ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                      <div class="modal-dialog modal-l">
                        <div class="modal-content animated fadeIn">
                          <div class="modal-header">
                            <h5 class="modal-title">Data Warga Binaan Pemasyarakatan</h5>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="contact-box">
                                  <div class="row">
                                    <div class="col-4">
                                      <div class="text-center">
                                        <img alt="image" class="rounded-circle circle-border m-b-md" src="assets/images/190642.png" height="120px">
                                      </div>
                                    </div>
                                    <div class="col-8">
                                      <form class="m-t" role="form" enctype="multipart/form-data" method="post" action="Proses/Update/Data-WBP/<?php echo $dtwbp->no_induk ?>">
                                        <div class="form-group">
                                          <h3><strong><?php echo $dtwbp->nama_wbp_wbp ?></strong></h3>
                                        </div>
                                        <div class="form-group">
                                          <input type="text" class="form-control col-12" name="Kejahatan" value="<?php echo $dtwbp->kejahatan?>">
                                        </div>
                                        <div class="form-group">
                                          <input type="text" class="form-control col-12" name="Kamar" value="<?php echo $dtwbp->kamar ?>">
                                        </div>
                                        <div class="form-group">
                                          <select class="form-control m-b" name="Status">
                                            @if($dtwbp->status == "TAHANAN")
                                            <option value="TAHANAN" selected>TAHANAN</option>
                                            <option value="NARAPIDANA">NARAPIDANA</option>
                                            @else
                                            <option value="TAHANAN" >TAHANAN</option>
                                            <option value="NARAPIDANA" selected>NARAPIDANA</option>
                                            @endif
                                          </select>
                                        </div>
                                      </div>
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
                    <button class="btn btn-warning btn-rounded" data-toggle="modal" data-target="#LihatWBP<?php echo $dtwbp->no_induk ?>"><i class="fa fa-eye"></i> Lihat</button>
                    <div class="modal inmodal" id="LihatWBP<?php echo $dtwbp->no_induk ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                      <div class="modal-dialog modal-l">
                        <div class="modal-content animated fadeIn">
                          <div class="modal-header">
                            <h5 class="modal-title">Data Warga Binaan Pemasyarakatan</h5>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="contact-box">
                                  <div class="row">
                                    <div class="col-4">
                                      <div class="text-center">
                                        <img alt="image" class="rounded-circle circle-border m-b-md" src="assets/images/190642.png" height="120px">
                                      </div>
                                    </div>
                                    <div class="col-8">
                                      <form class="m-t" role="form" enctype="multipart/form-data" method="post" action="Proses/Delete/Data-WBP/<?php echo $dtwbp->no_induk ?>">
                                        <div class="form-group">
                                          <h3><strong><?php echo $dtwbp->nama_wbp ?></strong></h3>
                                        </div>
                                        <div class="form-group">
                                          <input type="text" class="form-control col-12" name="Kejahatan" readonly value="<?php echo $dtwbp->kejahatan?>" >
                                        </div>
                                        <div class="form-group">
                                          <input type="text" class="form-control col-12" name="Kamar" readonly value="<?php echo $dtwbp->kamar ?>" >
                                        </div>
                                        <div class="form-group">
                                          <select class="form-control m-b" readonly name="Status" >
                                            @if($dtwbp->status == "TAHANAN")
                                            <option value="TAHANAN" selected>TAHANAN</option>
                                            <option value="NARAPIDANA">NARAPIDANA</option>
                                            @else
                                            <option value="TAHANAN" >TAHANAN</option>
                                            <option value="NARAPIDANA" selected>NARAPIDANA</option>
                                            @endif
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#DeleteWBP<?php echo $dtwbp->no_induk ?>"><i class="fa fa-trash"></i> Hapus</button>
                    <div class="modal inmodal" id="DeleteWBP<?php echo $dtwbp->no_induk ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                      <div class="modal-dialog modal-l">
                        <div class="modal-content animated fadeIn">
                          <div class="modal-header">
                            <h5 class="modal-title">Apakah Anda Yakin Akan Menghapus Data Dibawah Ini ??</h5>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="contact-box">
                                  <div class="row">
                                    <div class="col-4">
                                      <div class="text-center">
                                        <img alt="image" class="rounded-circle circle-border m-b-md" src="assets/images/190642.png" height="120px">
                                      </div>
                                    </div>
                                    <div class="col-8">
                                      <form class="m-t" role="form" enctype="multipart/form-data" method="post">
                                        <div class="form-group">
                                          <h3><strong><?php echo $dtwbp->nama_wbp ?></strong></h3>
                                        </div>
                                        <div class="form-group">
                                          <input type="text" class="form-control col-12" name="Kejahatan" readonly value="<?php echo $dtwbp->kejahatan?>" >
                                        </div>
                                        <div class="form-group">
                                          <input type="text" class="form-control col-12" name="Kamar" readonly value="<?php echo $dtwbp->kamar ?>" >
                                        </div>
                                        <div class="form-group">
                                          <select class="form-control m-b" readonly name="Status" >
                                            @if($dtwbp->status == "TAHANAN")
                                            <option value="TAHANAN" selected>TAHANAN</option>
                                            <option value="NARAPIDANA">NARAPIDANA</option>
                                            @else
                                            <option value="TAHANAN" >TAHANAN</option>
                                            <option value="NARAPIDANA" selected>NARAPIDANA</option>
                                            @endif
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Yakin</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
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
