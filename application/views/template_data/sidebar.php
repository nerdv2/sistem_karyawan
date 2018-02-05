<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="<?= site_url(''); ?>">PT. Citra Agro Buana Semesta</a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
      <li class="active" id="sidebardashboard">
        <a href="<?= site_url(''); ?>">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Dashboard</div>
        </a>
      </li>
      <li id="sidebarkaryawan" class="dropdown ">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <div class="icon">
            <i class="fa fa-users" aria-hidden="true"></i>
          </div>
          <div class="title">Karyawan</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="<?php echo site_url("karyawan"); ?>">Data Karyawan</a></li>
            <li><a href="<?php echo site_url("laporan"); ?>">Data Excel</a></li>
          </ul>
        </div>
      </li>
      <li id="sidebarmasterdata" class="dropdown ">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <div class="icon">
            <i class="fa fa-database" aria-hidden="true"></i>
          </div>
          <div class="title">Master Data</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li><a href="<?php echo site_url("statuskawin"); ?>">Data Status Kawin</a></li>
            <li><a href="<?php echo site_url("agama"); ?>">Data Agama</a></li>
            <li><a href="<?php echo site_url("pendidikanterakhir"); ?>">Data Pendidikan Terakhir</a></li>
            <li><a href="<?php echo site_url('jabatan'); ?>">Data Jabatan</a></li>
            <li><a href="<?php echo site_url("statuskaryawan"); ?>">Data Status Karyawan</a></li>
          </ul>
        </div>
      </li>
      <?php if ($_SESSION['status'] == 1)
        {
      ?>
        <li id="sidebarusers">
          <a href="<?= site_url('users'); ?>">
            <div class="icon">
              <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <div class="title">Users</div>
          </a>
        </li>
      <?php
        }
      ?>

      

    </ul>
  </div>
</aside>