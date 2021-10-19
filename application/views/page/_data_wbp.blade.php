@extends('master')
@section('content')
@include('page._headpage')
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox ">
        <div class="ibox-title">
          <h5>Data Warga Binaan Pemasyarakatan</h5>
          <div class="ibox-tools">
            <button class="btn btn-info " type="button"><i class="fa fa-upload"></i> Upload WBP</button>
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
                <tr class="gradeX">
                  <td>1</td>
                  <td>jajang Bin Nurrohmat</td>
                  <td>Pencurian</td>
                  <td class="center">13 Oktober 2021</td>
                  <td class="center">
                    <a class="btn btn-primary btn-rounded" href="#"><i class="fa fa-pencil"></i> Edit</a>
                    <a class="btn btn-warning btn-rounded" href="#"><i class="fa fa-eye"></i> Lihat</a>
                    <a class="btn btn-danger btn-rounded" href="#"><i class="fa fa-trash"></i> Hapus</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
