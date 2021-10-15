@extends('master')
@section('content')
@include('page._headpage')
<div class="row">
  <div class="col-lg-12">
    <h5>Grafik Penggunaan Layanan Pemasyarakatan</h5>
    <div class="flot-chart m-b-xl">
      <div class="flot-chart-content" id="flot-dashboard5-chart"></div>
    </div>
  </div>
</div>
@endsection
