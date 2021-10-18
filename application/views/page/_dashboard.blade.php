@extends('master')
@section('content')
@include('page._headpage')
<div class="row">
  <div class="col-lg-12">
    <h5>Grafik Penggunaan Layanan Pemasyarakatan</h5>
    <div class="col-md-12">
      <canvas id="myChart"></canvas>
    </div>
  </div>
</div>
@endsection
