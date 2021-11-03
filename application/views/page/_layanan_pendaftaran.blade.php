@extends('master')
@section('content')
@include('page._headpage')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox ">
        <div class="ibox-title">
          <h5>Formulir Pendaftaran Layanan Pemasyarakatan</h5>
          <div class="ibox-tools">
            <button class="btn btn-info" type="button" data-toggle="modal" data-target="#Tambah"><i class="fa fa-upload"></i> Tambah</button>
          </div>
        </div>
        <div class="ibox-content">

          <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama WBP</th>
                  <th>Tgl Pelaksanaan</th>
                  <th>Jenis Layanan</th>
                  <th>Kode Ticket</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; ?>
                @foreach($layanan as $dtlayanan)
                @if($dtlayanan->no_identitas==$_SESSION['no_identitas'])
                <tr class="gradeX">
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $dtlayanan->nama_wbp ?></td>
                  <td><?php echo $dtlayanan->tgl_pelaksanaan ?></td>
                  <td class="center"><?php echo $dtlayanan->jenis_layanan?></td>
                  <td class="center"><?php echo $dtlayanan->tiket ?></td>
                  <td class="center">
                    <button class="btn <?php echo $dtlayanan->button ?> btn-rounded" href="#"><i class="fa fa-eye"></i> <?php echo $dtlayanan->status_layanan ?></button>
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$CI = get_instance();
$NoIdentitas=$_SESSION['no_identitas'];
$check=$CI->m_user->search_user($NoIdentitas);
if($check->num_rows() == 1){
  foreach($check->result() as $data){
    ?>
    <div class="modal inmodal" id="Tambah" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content animated fadeIn">
          <div class="modal-header">
            <h5 class="modal-title"> Formulir Layanan Pendaftaran</h5>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-6">
                <div class="contact-box">
                  <div class="row">
                    <div class="col-12">
                      <form class="m-t" role="form" enctype="multipart/form-data" method="post" action="Proses/Tambah/Pendaftaran">
                        <div class="form-group">
                          <input type="text" class="form-control col-12" name="NoIdentitas" value="<?php echo $data->no_identitas; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control col-12" name="Nama"  value="<?php echo $data->nama; ?>" readonly>
                        </div>
                        <div class="form-group">
                          <textarea class="form-control col-12" name="Alamat" placeholder="Alamat" readonly><?php echo $data->alamat; ?></textarea>
                        </div>
                        <div class="form-group">
                          <select class="form-control m-b" name="JenisKelamin" readonly>
                            @if($data->jenis_kelamin == "Laki-Laki")
                            <option value="Laki-Laki" selected>Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            @else
                            <option value="Laki-Laki" >Laki-Laki</option>
                            <option value="Perempuan" selected>Perempuan</option>
                            @endif
                          </select>
                        </div>
                        <div class="form-group">
                          <input type="text" class="form-control col-12" name="NoHandphone" value="<?php echo $data->no_handphone; ?>" readonly>
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
                          <select data-placeholder="~ Pilih Warga Binaan ~" class="chosen-select form-control"  tabindex="2" name="NoInduk">
                            <option disabled selected>~ Pilih Warga Binaan ~</option>
                            @foreach($CI->m_datawbp->tmpl_datawbp()->result() as $dtwbp)
                            <option value="<?= $dtwbp->no_induk ?>"><?= $dtwbp->nama_wbp; ?></option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group col-12">
                        <input type="date" class="form-control" name="TglPelaksanaan" id="TglPelaksanaan" format="YYYY-mm-dd">
                      </div>
                      <div class="form-group col-12" >
                        <select data-placeholder="~ Pilih Jenis Layanan~" class="chosen-select form-control"  tabindex="2" name="JenisLayanan" id="JenisLayanan">
                          <option disabled selected>~ Pilih Jenis Layanan ~</option>
                          <option value="Video Call">Video Call</option>
                          <option value="Penitipan Barang">Penitipan Barang</option>
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
  <?php } }
  ?>
  @endsection
