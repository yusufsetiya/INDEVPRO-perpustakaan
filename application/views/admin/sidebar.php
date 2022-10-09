<div class="l-navbar" id="nav-bar">
  <nav class="nav">
    <div>

      <a href="#" class="nav_logo"> <i class='bx bx-library nav_logo-icon'></i> <span class="nav_logo-name">Perpus Unmer</span> </a>
      <div class="nav_list"> <a href="<?php echo base_url('ControlAdmin') ?>" class="nav_link">
          <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span>
        </a>
        <a href="<?php echo base_url('ControlAdmin/user') ?>" class="nav_link">
          <i class='bx bx-user-circle nav_icon'></i>
          <span class="nav_name">User</span>
        </a>
        <!-- <a href="{{url_for('diagnosa')}}" class="nav_link"> 
              <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
              <span class="nav_name">Antrian Pasien</span> 
          </a>  -->
      </div>
      <a href="<?= base_url('ControlLogin/logout') ?>" class="nav_link">
        <i class='bx bx-log-out nav_icon'></i>
        <span class="nav_name">SignOut</span>
      </a>
  </nav>
</div>