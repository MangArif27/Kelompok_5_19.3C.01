<div class="dropdown profile-element">
  <img alt="image" class="rounded-circle" src="<?php $photo=$_SESSION['photo']; echo base_url('assets/images/'.$photo)?>" height="100px"/>
  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
    <span class="block m-t-xs font-bold"><?php $nama=$_SESSION['nama']; echo $nama; ?></span>
    <span class="text-muted text-xs block"><?php $NoIdentitas=$_SESSION['no_identitas']; echo $NoIdentitas; ?> <b class="caret"></b></span>
  </a>
  <ul class="dropdown-menu animated fadeInRight m-t-xs">
    <li><a class="dropdown-item" href="Profile">Profile</a></li>
    <li class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="Login">Logout</a></li>
  </ul>
</div>
