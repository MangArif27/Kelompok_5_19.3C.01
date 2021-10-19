<!DOCTYPE html>
<html>
@include('partials._head')
<body class="gray-bg">
    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-bold">Selamat Datang Di Sistem Informasi Layanan Pemasyarakatan</h2>
                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>
                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>
                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                </p>
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" method="post" action="Proses/Login">
                        <div class="form-group">
                            <input type="number" name="NoIdentitas" class="form-control" placeholder="Username" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" name="Password" class="form-control" placeholder="Password" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                        <a href="#">
                            <small>Lupa Password</small>
                        </a>
                        <p class="text-muted text-center">
                            <small>Apakah Kamu Belum Mempunyai Akun ?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="Registrasi">Klik Buat Akun !</a>
                    </form>
                    <p class="m-t">
                        <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        @include('partials._footer')
    </div>
</body>
</html>
