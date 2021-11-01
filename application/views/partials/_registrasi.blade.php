<!DOCTYPE html>
<html>
@include('partials._head')
<body class="gray-bg">
  <div class="loginColumns animated fadeInDown">
    <div class="row">
      <div class="col-md-6">
        <div class="ibox-content">
          <h2 class="font-bold">Registrasi Akun SI LP</h2>
          <form class="m-t" role="form" enctype="multipart/form-data" method="post" action="Proses/Registrasi">
            <div class="form-group">
              <input type="number" name="NoIdentitas" class="form-control" placeholder="No Identitas" required="">
            </div>
            <div class="form-group">
              <input type="text" name="Nama" class="form-control" placeholder="Nama Sesuai Identitas" required="">
            </div>
            <div class="form-group">
              <div class="i-checks">
                <label><input type="radio" value="Laki-Laki" name="JenisKelamin"> <i></i> Laki-Laki </label>
                <label><input type="radio" value="Perempuan" name="JenisKelamin"> <i></i> Perempuan </label>
              </div>
            </div>
            <div class="form-group">
              <textarea name="Alamat" class="form-control" placeholder="alamat Sesuai Identitas" required=""></textarea>
            </div>
            <div class="form-group">
              <input type="phone" name="NoHandphone" class="form-control" placeholder="No Handphone" required="">
            </div>
            <div class="form-group">
              <input type="email" name="Email" class="form-control" placeholder="E-Mail" required="">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="ibox-content">
            <div class="form-group">
              <label>Photo Diri :</label>
              <input type="file" name="Photo" id="Photo" class="form-control" placeholder="Photo Diri" accept="image/png, image/jpeg, image/jpg, image/gif" required="">
            </div>
            <div class="form-group">
              <label>Scan Identitas :</label>
              <input type="file" name="ScanIdentitas" id="ScanIdentitas" class="form-control" placeholder="Scan Identitas" required="">
            </div>
            <div class="form-group">
              <input type="password" name="Password" class="form-control" placeholder="Password" required="">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Submit</button>
            <a href="#">
              <small>Lupa Password</small>
            </a>
            <p class="text-muted text-center">
              <small>Apakah Kamu Sudah Mempunyai Akun ?</small>
            </p>
            <a class="btn btn-sm btn-white btn-block" href="Login">Klik Login !</a>
          </form>
          <p class="m-t">
          </p>
        </div>
      </div>
    </div>
    <hr/>
    @include('partials._footer')
  </div>
  @include('partials._script')
</body>
</html>
