<!DOCTYPE html>
<html>
@include('partials._head')
<?php
$CI = get_instance();
$level=$_SESSION['level'];
$NoIdentitas=$_SESSION['no_identitas'];
$check=$CI->m_user->search_user($NoIdentitas);
if($check->num_rows() == 1){
  foreach($check->result() as $data){
    ?>
    <body>
      <div id="wrapper">
        @include('partials._sidebar')
        <div id="page-wrapper" class="gray-bg dashbard-1">
          @include('partials._navbar')
          <div class="row">
            <div class="col-lg-12">
              <div class="wrapper wrapper-content">
                @yield('content')
              </div>
            </div>
          </div>
          @include('partials._footer')
        </div>
      </div>
      @include('partials._script')
    </body>
  <?php } }
  ?>
  </html>
