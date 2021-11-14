<?php
$url="/SIPL-VC/Counter-Cetak-Tiket";
header("Refresh:5; $url");
?>
<!DOCTYPE html>
<html>
<head>
  <style>

  {
    margin:0;
    padding:0;
    font-family: arial;
    font-size:6pt;
    color:#000;
  }
  body
  {
    width:100%;
    font-family: arial;
    font-size:6pt;
    margin:0;
    padding:0;
  }

  p
  {
    margin:0;
    padding:0;
    margin-left: 0px;
  }

  #wrapper
  {
    width:44mm;
    margin:0 0mm;
  }

  #main {
    float:left;
    width:0mm;
    background:#ffffff;
    padding:0mm;
  }

  #sidebar {
    float:right;
    width:0mm;
    background:#ffffff;
    padding:0mm;
  }

  .page
  {
    height:100mm;
    width:80mm;
    page-break-after:always;
  }

  table
  {
    /** border-left: 1px solid #fff;
    border-top: 1px solid #fff; **/
    font-family: arial;
    border-spacing:0;
    border-collapse: collapse;

  }

  table td
  {
    /**border-right: 1px solid #fff;
    border-bottom: 1px solid #fff;**/
    padding: 2mm;

  }

  table.heading
  {
    height:0mm;
    margin-bottom: 1px;
  }

  h1.heading
  {
    font-size:6pt;
    color:#000;
    font-weight:normal;
    font-style: italic;


  }

  h2.heading
  {
    font-size:6pt;
    color:#000;
    font-weight:normal;
  }

  hr
  {
    color:#ccc;
    background:#ccc;
  }

  #invoice_body
  {
    height: auto;
  }

  #invoice_body , #invoice_total
  {
    width:100%;
  }
  #invoice_body table , #invoice_total table
  {
    width:100%;
    /** border-left: 1px solid #ccc;
    border-top: 1px solid #ccc; **/

    border-spacing:0;
    border-collapse: collapse;

    margin-top:0mm;
  }

  #invoice_body table td , #invoice_total table td
  {
    font-size:8pt;
    /** border-right: 1px solid black;
    border-bottom: 1px solid black;**/
    padding:0 0;
    font-weight: normal;
  }

  #invoice_head table td
  {
    text-align:left;
    font-size:8pt;
    /** border-right: 1px solid black;
    border-bottom: 1px solid black;**/
    padding:0 0;
    font-weight: normal;
  }

  #invoice_body table td.mono  , #invoice_total table td.mono
  {
    text-align:right;
    padding-right:0mm;
    font-size:6pt;
    border: 1px solid white;
    font-weight: normal;
  }

  #footer
  {
    width:44mm;
    margin:0 2mm;
    padding-bottom:1mm;
  }
  #footer table
  {
    width:100%;
    /** border-left: 1px solid #ccc;
    border-top: 1px solid #ccc; **/

    background:#eee;

    border-spacing:0;
    border-collapse: collapse;
  }
  #footer table td
  {
    width:25%;
    text-align:center;
    font-size:8pt;
    /** border-right: 1px solid #ccc;
    border-bottom: 1px solid #ccc;**/
  }
  </style>
  <script language="Javascript1.2">
  <!--
  function printpage() {
    window.print();
  }
  //-->
  </script>
</head>
<body>
  <div id="wrapper">
    <div id="invoice_head">
      <?php
      $CI = get_instance();
      $check=$CI->db->query("SELECT * FROM about WHERE id_upt='516'");
      if($check->num_rows() == 1){
        foreach($check->result() as $apk){

          ?>
          <table style="width:170%; border-spacing:0;">
            <tr>
              <td rowspan="4">
                <img src="https://www.kemenkumham.go.id/images/jux_portfolio_pro/logo_fix.png" width="40px">
              </td>
              <td style="font-size: 6pt;">
                <center><p>KEMENTERIAN HUKUM DAN HAM REPUBLIK INDONESIA</p>
                  <p>KANTOR WILAYAH JAWA BARAT</p>
                  <b><?= $apk->nama_upt; ?></b></center>
                </td>
              </tr>
              <tr>
                <td style="font-size: 4pt;">
                  <center><p>{{ $apk->alamat }}</p>
                    <p>Telp. {{ $apk->no_tlp }} Email : {{ $apk->email }} Website : {{ $apk->website }}</p></center>
                  </td>
                </tr>
                <tr>
                </tr>
              </table>
              <?php
            } }?>
            @foreach($ticket as $tkt)
            <table style="width:170%; border-spacing:0;">
              <tr>
                <td style="font-size: 7pt;">==================================================</td>
              </tr>
              <tr>
                <td><b><center>SURAT IJIN PENITIPAN BARANG</center></b></td>
              </tr>
              <tr>
                <td style="font-size: 7pt;">==================================================</td>
              </tr>
            </table>
            <table style="width:170%; border-spacing:0;">
              <tr>
                <td>Nama Pengunjung  </td>
                <td>: {{$tkt->nama}}</td>
                <td rowspan="4">
                  <img src="<?= base_url('assets/images/'.$tkt->photo)?>" width="40px">
                </td>
              </tr>
              <tr>
                <td>Jenis Kelamin </td>
                <td>: {{$tkt->jenis_kelamin}}</td>
              </tr>
              <tr>
                <td>No Identitas </td>
                <td>: {{$tkt->no_identitas}}</td>
              </tr>
              <tr>
                <td>Alamat </td>
                <td>: {{$tkt->alamat}}</td>
              </tr>
            </table>
            <table style="width:164%; border-spacing:0;" border="0">
            </br>
            <tr>
              <td style="font-size: 7pt;"></br>==================================================</td>
            </tr>
            <tr>
              <td><center>DATA WARGA BINAAN PEMASYARAKATAN</center></td>
            </tr>
            <tr>
              <td style="font-size: 7pt;"></br>==================================================</td>
            </tr>
          </table>
          <table style="width:164%; border-spacing:0;" border="0">
            <tr>
              <td>Nama WBP</td>
              <td>: {{$tkt->nama_wbp}}</td>
            </tr>
          <tr>
            <td>Perkara/Kejahatan</td>
            <td>: {{$tkt->kejahatan}}</td>
          </tr>
          <tr>
            <td>Status WBP</td>
            <td>: {{$tkt->status}}</td>
          </tr>
          <tr>
            <td>Blok/Kamar</td>
            <td>: {{$tkt->kamar}}</td>
          </tr>
        </table>
        <table style="width:164%; border-spacing:0;" border="0">
          <tr>
            <td style="color:#FF0000; font-size: 4pt;">* Layanan Ini Tidak Dipungut Biaya</td>
          </tr>
          <tr>
            <td style="color:#FF0000; font-size: 4pt;">* Apabila anda ada keluhan terhadap pelayanan kunjungan Silahkan SMS 085871174319</td>
          </tr>
          <tr>
          </br>
        </tr>
      </table>
    </div>
  </div>
  @endforeach
</body>
<script>
window.onload=function()
{
  window.print();
}
</script>
</html>
