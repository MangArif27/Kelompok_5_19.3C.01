@extends('master')
@section('content')
@include('page._headpage')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox ">
        <?php $CI = get_instance(); ?>
        @if($CI->session->flashdata('message_login_error'))
        <div class="alert alert-danger col-md-12 alert-dismissable">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <a class="alert-link" href="#"><?= $CI->session->flashdata('message_login_error') ?></a>.
        </div>
        @elseif($CI->session->flashdata('message_login_success'))
        <div class="alert alert-success col-md-12 alert-dismissable">
          <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
          <a class="alert-link" href="#"><?= $CI->session->flashdata('message_login_success') ?></a>.
        </div>
        @else
        @endif

        <div class="ibox-title">
          <h5>Data Pengguna Sistem Layanan Pemasyarakatan</h5>
          <div class="ibox-tools">
            <button class="btn btn-info " type="button" data-toggle="modal" data-target="#TambahPengguna"><i class="fa fa-plus"></i> Tambah Pengguna</button>
          </div>
        </div>
        <div class="ibox-content">
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Identitas</th>
                  <th>Nama</th>
                  <th>Tgl Registrasi</th>
                  <th>Login Terakhir</th>
                  <th>Level User</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                @foreach($user as $usr)
                <tr class="gradeX">
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $usr->no_identitas ?></td>
                  <td ><?php echo $usr->nama ?></td>
                  <td class="center"><?php echo $usr->created ?></td>
                  <td class="center"><?php echo $usr->updated ?></td>
                  <td class="center">
                    <a class="btn <?php echo $usr->button ?> btn-rounded btn-outline"><?php echo $usr->level ?> </a>
                  </td>
                  <td class="center">
                    <button class="btn btn-primary btn-rounded"  data-toggle="modal" data-target="#EditPengguna<?php echo $usr->no_identitas ?>"><i class="fa fa-pencil"></i> Edit</button>
                    <div class="modal inmodal" id="EditPengguna<?php echo $usr->no_identitas ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content animated fadeIn">
                          <div class="modal-header">
                            <h5 class="modal-title"> Data Identitas : <?php echo $usr->nama ?></h5>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-lg-7">
                                <div class="contact-box">
                                  <div class="row">
                                    <div class="col-4">
                                      <div class="text-center">
                                        <img alt="image" class="rounded-circle circle-border m-b-md" src="<?php echo base_url('assets/images/'.$usr->photo)?>" height="120px">
                                        <div class="m-t-xs font-bold"><?php echo $usr->no_identitas ?></div>
                                      </div>
                                    </div>
                                    <div class="col-8">
                                      <form class="m-t" role="form" enctype="multipart/form-data" method="post" action="Proses/Update/<?php echo $usr->no_identitas ?>">
                                        <div class="form-group">
                                          <h3><strong><?php echo $usr->nama ?></strong></h3>
                                        </div>
                                        <div class="form-group">
                                          <textarea class="form-control col-12" name="Alamat" placeholder="Alamat"><?php echo $usr->alamat ?></textarea>
                                        </div>
                                        <div class="form-group">
                                          <select class="form-control m-b" name="JenisKelamin">
                                            @if($usr->jenis_kelamin == "Laki-Laki")
                                            <option value="Laki-Laki" selected>Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                            @else
                                            <option value="Laki-Laki" >Laki-Laki</option>
                                            <option value="Perempuan" selected>Perempuan</option>
                                            @endif
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <input type="number" class="form-control col-12" name="NoHandphone" value="<?php echo $usr->no_handphone ?>" placeholder="Nomor Handphone">
                                        </div>
                                        <div class="form-group">
                                          <input type="email" class="form-control col-12" name="Email" value="<?php echo $usr->email ?>" placeholder="Email">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-5">
                                  <div class="contact-box">
                                    <div class="row">
                                      <div class="col-12">
                                        <div class="text-center">
                                          <img alt="image" class="feed-photo" width="250px" src="<?php echo base_url('assets/images/'.$usr->scan_identitas)?>" >
                                        </div>
                                        <div class="form-group">
                                          <input type="password" class="form-control col-12" name="Password" value="<?php $password=md5($usr->password); echo $password ?>" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                          <select class="form-control m-b" name="Level">
                                            @if($usr->level == "Admin")
                                            <option value="Admin" selected>Admin</option>
                                            <option value="User">User</option>
                                            <option value="Pending">Pending</option>
                                            @elseif($usr->level == "User")
                                            <option value="Admin" >Admin</option>
                                            <option value="User" selected>User</option>
                                            <option value="Pending">Pending</option>
                                            @else
                                            <option value="Admin" >Admin</option>
                                            <option value="User" >User</option>
                                            <option value="Pending" selected>Pending</option>
                                            @endif
                                          </select>
                                        </div>
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
                    <button class="btn btn-warning btn-rounded"  data-toggle="modal" data-target="#LihatPengguna<?php echo $usr->no_identitas ?>"><i class="fa fa-eye"></i> Lihat</button>
                    <div class="modal inmodal" id="LihatPengguna<?php echo $usr->no_identitas ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content animated fadeIn">
                          <div class="modal-header">
                            <h5 class="modal-title"> Data Identitas : <?php echo $usr->nama ?></h5>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-lg-7">
                                <div class="contact-box">
                                  <div class="row">
                                    <div class="col-4">
                                      <div class="text-center">
                                        <img alt="image" class="rounded-circle circle-border m-b-md" src="<?php echo base_url('assets/images/'.$usr->photo)?>" height="120px">
                                        <div class="m-t-xs font-bold"><?php echo $usr->no_identitas ?></div>
                                      </div>
                                    </div>
                                    <div class="col-8">
                                      <form class="m-t" role="form" enctype="multipart/form-data" method="post" action="Proses/Update/<?php echo $usr->no_identitas ?>">
                                        <div class="form-group">
                                          <h3><strong><?php echo $usr->nama ?></strong></h3>
                                        </div>
                                        <div class="form-group">
                                          <textarea class="form-control col-12" name="Alamat" placeholder="Alamat" readonly><?php echo $usr->alamat ?></textarea>
                                        </div>
                                        <div class="form-group">
                                          <select class="form-control m-b" name="JenisKelamin" readonly>
                                            @if($usr->jenis_kelamin == "Laki-Laki")
                                            <option value="Laki-Laki" selected>Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                            @else
                                            <option value="Laki-Laki" >Laki-Laki</option>
                                            <option value="Perempuan" selected>Perempuan</option>
                                            @endif
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <input type="number" class="form-control col-12" name="NoHandphone" value="<?php echo $usr->no_handphone ?>" placeholder="Nomor Handphone" readonly>
                                        </div>
                                        <div class="form-group">
                                          <input type="email" class="form-control col-12" name="Email" value="<?php echo $usr->email ?>" placeholder="Email" readonly>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-5">
                                  <div class="contact-box">
                                    <div class="row">
                                      <div class="col-12">
                                        <div class="text-center">
                                          <img alt="image" class="feed-photo" width="250px" src="<?php echo base_url('assets/images/'.$usr->scan_identitas)?>" >
                                        </div>
                                        <div class="form-group">
                                          <input type="password" class="form-control col-12" name="Password" value="<?php $password=md5($usr->password); echo $password ?>" placeholder="Password" readonly>
                                        </div>
                                        <div class="form-group">
                                          <select class="form-control m-b" name="Level" readonly>
                                            @if($usr->level == "Admin")
                                            <option value="Admin" selected>Admin</option>
                                            <option value="User">User</option>
                                            <option value="Pending">Pending</option>
                                            @elseif($usr->level == "User")
                                            <option value="Admin" >Admin</option>
                                            <option value="User" selected>User</option>
                                            <option value="Pending">Pending</option>
                                            @else
                                            <option value="Admin" >Admin</option>
                                            <option value="User" >User</option>
                                            <option value="Pending" selected>Pending</option>
                                            @endif
                                          </select>
                                        </div>
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
                    <button class="btn btn-danger btn-rounded" data-toggle="modal" data-target="#HapusPengguna<?php echo $usr->no_identitas ?>"><i class="fa fa-trash"></i> Hapus</button>
                    <div class="modal inmodal" id="HapusPengguna<?php echo $usr->no_identitas ?>" tabindex="-1" role="dialog"  aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content animated fadeIn">
                          <div class="modal-header">
                            <h5 class="modal-title"> Apakah Anda Yakin Akan Menghapus Data Dibawah Ini ??</h5>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-lg-7">
                                <div class="contact-box">
                                  <div class="row">
                                    <div class="col-4">
                                      <div class="text-center">
                                        <img alt="image" class="rounded-circle circle-border m-b-md" src="<?php echo base_url('assets/images/'.$usr->photo)?>" height="120px">
                                        <div class="m-t-xs font-bold"><?php echo $usr->no_identitas ?></div>
                                      </div>
                                    </div>
                                    <div class="col-8">
                                      <form class="m-t" role="form" enctype="multipart/form-data" method="post" action="Proses/Delete/Pengguna/<?php echo $usr->no_identitas ?>">
                                        <div class="form-group">
                                          <h3><strong><?php echo $usr->nama ?></strong></h3>
                                        </div>
                                        <div class="form-group">
                                          <textarea class="form-control col-12" name="Alamat" placeholder="Alamat" readonly><?php echo $usr->alamat ?></textarea>
                                        </div>
                                        <div class="form-group">
                                          <select class="form-control m-b" name="JenisKelamin" readonly>
                                            @if($usr->jenis_kelamin == "Laki-Laki")
                                            <option value="Laki-Laki" selected>Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                            @else
                                            <option value="Laki-Laki" >Laki-Laki</option>
                                            <option value="Perempuan" selected>Perempuan</option>
                                            @endif
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <input type="number" class="form-control col-12" name="NoHandphone" value="<?php echo $usr->no_handphone ?>" placeholder="Nomor Handphone" readonly>
                                        </div>
                                        <div class="form-group">
                                          <input type="email" class="form-control col-12" name="Email" value="<?php echo $usr->email ?>" placeholder="Email" readonly>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-5">
                                  <div class="contact-box">
                                    <div class="row">
                                      <div class="col-12">
                                        <div class="text-center">
                                          <img alt="image" class="feed-photo" width="250px" src="<?php echo base_url('assets/images/'.$usr->scan_identitas)?>" >
                                        </div>
                                        <div class="form-group">
                                          <input type="password" class="form-control col-12" name="Password" value="<?php $password=md5($usr->password); echo $password ?>" placeholder="Password" readonly>
                                        </div>
                                        <div class="form-group">
                                          <select class="form-control m-b" name="Level" readonly>
                                            @if($usr->level == "Admin")
                                            <option value="Admin" selected>Admin</option>
                                            <option value="User">User</option>
                                            <option value="Pending">Pending</option>
                                            @elseif($usr->level == "User")
                                            <option value="Admin" >Admin</option>
                                            <option value="User" selected>User</option>
                                            <option value="Pending">Pending</option>
                                            @else
                                            <option value="Admin" >Admin</option>
                                            <option value="User" >User</option>
                                            <option value="Pending" selected>Pending</option>
                                            @endif
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                              <button type="submit" class="btn btn-primary">Yakin</button>
                            </div>
                          </form>
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
<div class="modal inmodal" id="TambahPengguna" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated fadeIn">
      <div class="modal-header">
        <h5 class="modal-title"> Formulir Tambah Pengguna</h5>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="contact-box">
              <div class="row">
                <div class="col-12">
                  <form class="m-t" role="form" enctype="multipart/form-data" method="post" action="Proses/Tambah/Pengguna">
                    <div class="form-group">
                      <input type="text" class="form-control col-12" name="NoIdentitas"  placeholder="No Identitas">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control col-12" name="Nama"  placeholder="Nama Sesuai Identitas">
                    </div>
                    <div class="form-group">
                      <textarea class="form-control col-12" name="Alamat" placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group">
                      <select class="form-control m-b" name="JenisKelamin">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="number" class="form-control col-12" name="NoHandphone" placeholder="Nomor Handphone">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="contact-box">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <input type="email" class="form-control col-12" name="Email" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label>Photo Diri :</label>
                      <input type="file" class="form-control col-12" name="Photo" placeholder="Photo">
                    </div>
                    <div class="form-group">
                      <label>Scan Identitas :</label>
                      <input type="file" class="form-control col-12" name="ScanIdentitas" placeholder="Photo">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control col-12" name="Password" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <select class="form-control m-b" name="Level">
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                        <option value="Pending">Pending</option>f
                      </select>
                    </div>
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
@endsection
