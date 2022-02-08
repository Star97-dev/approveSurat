  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-folder-open"></i>
    </div>
    <div class="sidebar-brand-text mx-3"> BTN Cooperation </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    MAIN MENU
</div>

<?php if($user['role_id'] == 2) : ?>
<?php if($this->uri->segment(1) == 'Requirement') : ?>
    <li class="nav-item active">
    <?php else : ?>
<li class="nav-item">
    <?php endif; ?>
    <a class="nav-link" href="<?=base_url('Requirement')?>">
    <i class="fas fa-file-alt"></i>
        <span> Requirement </span></a>
</li>
<?php endif; ?>

<?php if($user['role_id'] == 1) : ?>
<?php if($this->uri->segment(1) == 'Document') : ?>
    <li class="nav-item active">
    <?php else : ?>
<li class="nav-item">
    <?php endif; ?>
    <a class="nav-link" href="<?=base_url('Document')?>">
    <i class="fas fa-file-alt"></i>
        <span>Document</span></a>
</li>
<?php endif; ?>

<?php if($user['role_id'] == 1) : ?>
<?php if($this->uri->segment(1) == 'Developer') : ?>
    <li class="nav-item active">
    <?php else : ?>
<li class="nav-item">
    <?php endif; ?>
    <a class="nav-link" href="<?=base_url('Developer')?>">
    <i class="fas fa-user-friends"></i>
        <span>Developer</span></a>
</li>
<?php endif; ?>

<?php if($user['role_id'] == 2) : ?>
<?php if($this->uri->segment(1) == 'Developer') : ?>
    <li class="nav-item active">
    <?php else : ?>
<li class="nav-item">
    <?php endif; ?>
    <a class="nav-link" href="<?=base_url('Developer/viewUser')?>">
    <i class="fas fa-user-friends"></i>
        <span>Developer</span></a>
</li>
<?php endif; ?>



<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    SETTINGS
</div>

<!-- Nav Item - Charts -->
<?php if($this->uri->segment(1) == 'Partner') : ?>
    <li class="nav-item active">
    <?php else : ?>
<li class="nav-item">
    <?php endif; ?>
    <a class="nav-link" href="<?=base_url('Partner')?>">
    <i class="far fa-user"></i>
        <span>My Profile</span></a>
</li>
<li class="nav-item">
    <a class="nav-link" href="charts.html" data-toggle="modal" data-target="#logoutModal">
    <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span></a>
        
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>
</ul>
<!-- End of Sidebar -->
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
   <!-- Main Content -->
   <div id="content">

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto"></ul>

</nav>
<!-- End of Topbar -->

