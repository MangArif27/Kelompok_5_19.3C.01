<div class="dropdown profile-element">
 <img alt="image" class="rounded-circle" src="<?php echo base_url('assets/images/'.$data->photo)?>" height="100px"/>
  <a data-toggle="dropdown" class="dropdown-toggle" href="#">
    <span class="block m-t-xs font-bold"><?php echo $data->nama; ?></span>
    <span class="text-muted text-xs block"><?php echo $data->no_identitas; ?> <b class="caret"></b></span>
  </a>
  <ul class="dropdown-menu animated fadeInRight m-t-xs">
    <li><a class="dropdown-item" href="Profile">Profile</a></li>
    <li class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="Login">Logout</a></li>
  </ul>
</div>
