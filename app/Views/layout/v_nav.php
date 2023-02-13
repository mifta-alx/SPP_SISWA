 <!-- Sidebar -->
 <style>

 </style>
 <ul class="navbar-nav sidebar sidebar-dark accordion" style="background-color: var(--moredark);" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center">
         <!-- <div class="sidebar-brand-icon rotate-n-15"> -->
         <div class="sidebar-brand-icon">
             <i class="las la-school"></i>
         </div>
         <div style="font-weight: 600;" class="sidebar-brand-text mx-3">SISWA<sup style="font-weight: 100;">SPP</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <!-- Admin -->
     <?php if (session()->get('level') == 'admin' || 'petugas' || 'siswa') { ?>
         <li class="nav-item <?= ($title == 'Dashboard') ? "active" : " "; ?>">
             <a class="nav-link" href="<?= base_url('Home') ?>">
                 <i class="las la-home" style="font-size: 20px;"></i>
                 <span>Dashboard</span></a>
         </li>
     <?php } ?>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <?php if (session()->get('level') == 'admin') { ?>
         <div class="sidebar-heading">
             Features
         </div>
     <?php } ?>

     <!-- Nav Item - SISWA -->
     <?php if (session()->get('level') == 'admin') { ?>
         <li class="nav-item <?= ($title == 'Tambah Data Siswa') || ($title == 'Tabel Data Siswa') || ($title == 'Edit Data Siswa') ? "active" : " "; ?>">
             <a class="nav-link <?= ($title == 'Tambah Data Siswa') || ($title == 'Tabel Data Siswa') || ($title == 'Edit Data Siswa') ? " " : "collapsed"; ?>" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                 <i class="las la-user-tie" style="font-size: 20px;"></i>
                 <span>Siswa</span>
             </a>
             <div id="collapseTwo" class="collapse <?= ($title == 'Tambah Data Siswa') || ($title == 'Tabel Data Siswa') || ($title == 'Edit Data Siswa') ? "show" : " "; ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Menu:</h6>
                     <a class="collapse-item <?= ($title == 'Tambah Data Siswa') ? "active" : " "; ?>" href="<?= base_url('Siswa/create') ?>">Tambah Data</a>
                     <a class="collapse-item <?= ($title == 'Tabel Data Siswa') || ($title == 'Edit Data Siswa') ? "active" : " "; ?>" href="<?= base_url('Siswa') ?>">Tabel Data</a>
                 </div>
             </div>
         </li>
     <?php } ?>
     <!-- Nav Item - PETUGAS -->
     <?php if (session()->get('level') == 'admin') { ?>
         <li class="nav-item <?= ($title == 'Tambah Data Petugas') || ($title == 'Tabel Data Petugas') || ($title == 'Edit Data Petugas') ? "active" : " "; ?>">
             <a class="nav-link <?= ($title == 'Tambah Data Petugas') || ($title == 'Tabel Data Petugas') || ($title == 'Edit Data Petugas') ? " " : "collapsed"; ?>" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                 <!-- <i class="fa fa-fw fa-cogs"></i> -->
                 <i class="las la-user-astronaut" style="font-size: 20px;"></i>
                 <span>Petugas</span>
             </a>
             <div id="collapseUtilities" class="collapse <?= ($title == 'Tambah Data Petugas') || ($title == 'Tabel Data Petugas') || ($title == 'Edit Data Petugas') ? "show" : " "; ?>" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Menu:</h6>
                     <a class="collapse-item <?= ($title == 'Tambah Data Petugas') ? "active" : " "; ?>" href="<?= base_url('Petugas/create') ?>">Tambah Data</a>
                     <a class="collapse-item <?= ($title == 'Tabel Data Petugas') || ($title == 'Edit Data Petugas') ? "active" : " "; ?>" href="<?= base_url('Petugas') ?>">Tabel Data</a>
                 </div>
             </div>
         </li>
     <?php } ?>
     <!-- Nav Item - KELAS -->
     <?php if (session()->get('level') == 'admin') { ?>
         <li class="nav-item <?= ($title == 'Tambah Data Kelas') || ($title == 'Tabel Data Kelas') || ($title == 'Edit Data Kelas') ? "active" : " "; ?>">
             <a class="nav-link <?= ($title == 'Tambah Data Kelas') || ($title == 'Tabel Data Kelas') || ($title == 'Edit Data Kelas') ? " " : "collapsed"; ?>" href="#" data-toggle="collapse" data-target="#collapsekelas" aria-expanded="true" aria-controls="collapsekelas">
                 <!-- <i class="fas fa-fw fa-building"></i> -->
                 <i class="las la-building" style="font-size: 20px;"></i>
                 <span>Kelas</span>
             </a>
             <div id="collapsekelas" class="collapse <?= ($title == 'Tambah Data Kelas') || ($title == 'Tabel Data Kelas') || ($title == 'Edit Data Kelas') ? "show" : " "; ?>" aria-labelledby="headingkelas" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Menu:</h6>
                     <a class="collapse-item <?= ($title == 'Tambah Data Kelas') ? "active" : " "; ?>" href="<?= base_url('Kelas/create') ?>">Tambah Data</a>
                     <a class="collapse-item <?= ($title == 'Tabel Data Kelas') || ($title == 'Edit Data Kelas') ? "active" : " "; ?>" href="<?= base_url('Kelas') ?>">Tabel Data</a>
                 </div>
             </div>
         </li>
     <?php } ?>
     <!-- Nav Item - SPP -->
     <?php if (session()->get('level') == 'admin') { ?>
         <li class="nav-item <?= ($title == 'Tambah Data SPP') || ($title == 'Tabel Data SPP') || ($title == 'Edit Data SPP') ? "active" : " "; ?>">
             <a class="nav-link <?= ($title == 'Tambah Data SPP') || ($title == 'Tabel Data SPP') || ($title == 'Edit Data SPP') ? " " : "collapsed"; ?>" href="#" data-toggle="collapse" data-target="#collapsespp" aria-expanded="true" aria-controls="collapsespp">
                 <i class="las la-file-invoice-dollar" style="font-size: 20px;"></i>
                 <span>SPP</span>
             </a>
             <div id="collapsespp" class="collapse <?= ($title == 'Tambah Data SPP') || ($title == 'Tabel Data SPP') || ($title == 'Edit Data SPP') ? "show" : " "; ?>" aria-labelledby="headingspp" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Menu:</h6>
                     <a class="collapse-item <?= ($title == 'Tambah Data SPP') ? "active" : " "; ?>" href="<?= base_url('SPP/create') ?>">Tambah Data</a>
                     <a class="collapse-item <?= ($title == 'Tabel Data SPP') || ($title == 'Edit Data SPP') ? "active" : " "; ?>" href="<?= base_url('SPP') ?>">Tabel Data</a>
                 </div>
             </div>
         </li>
     <?php } ?>
     <!-- Divider -->
     <?php if (session()->get('level') == 'admin') { ?>
         <hr class="sidebar-divider">
     <?php } ?>
     <!-- Heading -->
     <div class="sidebar-heading">
         Payment
     </div>

     <!-- Nav Item - Pembayaran -->
     <?php if (session()->get('level') == 'admin') { ?>
         <li class="nav-item <?= ($title == 'Tambah Data Pembayaran') || ($title == 'Tabel Data Pembayaran') || ($title == 'Edit Data Pembayaran') || ($title == 'Bayar SPP') ? "active" : " "; ?>">
             <a class="nav-link <?= ($title == 'Tambah Data Pembayaran') || ($title == 'Tabel Data Pembayaran') || ($title == 'Edit Data Pembayaran') || ($title == 'Bayar SPP') ? " " : "collapsed"; ?>" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                 <i class="las la-shopping-cart" style="font-size: 20px;"></i>
                 <span>Pembayaran</span>
             </a>
             <div id="collapsePages" class="collapse <?= ($title == 'Tambah Data Pembayaran') || ($title == 'Tabel Data Pembayaran') || ($title == 'Edit Data Pembayaran') || ($title == 'Bayar SPP') ? "show" : " "; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Menu:</h6>
                     <a class="collapse-item <?= ($title == 'Tambah Data Pembayaran') ? "active" : " "; ?>" href="<?= base_url('pembayaran/create') ?>">Tambah Data</a>
                     <a class="collapse-item <?= ($title == 'Tabel Data Pembayaran') || ($title == 'Edit Data Pembayaran') || ($title == 'Bayar SPP') ? "active" : " "; ?>" href="<?= base_url('pembayaran') ?>">Tabel Data</a>
                 </div>
             </div>
         </li>
    <?php }elseif (session()->get('level') == 'petugas') { ?>
         <li class="nav-item <?= ($title == 'Tambah Data Pembayaran') || ($title == 'Tabel Data Pembayaran') || ($title == 'Edit Data Pembayaran') || ($title == 'Bayar SPP') ? "active" : " "; ?>">
             <a class="nav-link <?= ($title == 'Tambah Data Pembayaran') || ($title == 'Tabel Data Pembayaran') || ($title == 'Edit Data Pembayaran') || ($title == 'Bayar SPP') ? " " : "collapsed"; ?>" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                 <i class="las la-shopping-cart" style="font-size: 20px;"></i>
                 <span>Pembayaran</span>
             </a>
             <div id="collapsePages" class="collapse <?= ($title == 'Tambah Data Pembayaran') || ($title == 'Tabel Data Pembayaran') || ($title == 'Edit Data Pembayaran') || ($title == 'Bayar SPP') ? "show" : " "; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Menu:</h6>
                     <a class="collapse-item <?= ($title == 'Tambah Data Pembayaran') ? "active" : " "; ?>" href="<?= base_url('pembayaran/create') ?>">Tambah Data</a>
                     <a class="collapse-item <?= ($title == 'Tabel Data Pembayaran') || ($title == 'Edit Data Pembayaran') || ($title == 'Bayar SPP') ? "active" : " "; ?>" href="<?= base_url('pembayaran') ?>">Tabel Data</a>
                 </div>
             </div>
         </li>
     <?php }else{ ?>
        <li class="nav-item d-none <?= ($title == 'Tambah Data Pembayaran') || ($title == 'Tabel Data Pembayaran') || ($title == 'Edit Data Pembayaran') || ($title == 'Bayar SPP') ? "active" : " "; ?>">
             <a class="nav-link <?= ($title == 'Tambah Data Pembayaran') || ($title == 'Tabel Data Pembayaran') || ($title == 'Edit Data Pembayaran') || ($title == 'Bayar SPP') ? " " : "collapsed"; ?>" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                 <i class="las la-shopping-cart" style="font-size: 20px;"></i>
                 <span>Pembayaran</span>
             </a>
             <div id="collapsePages" class="collapse <?= ($title == 'Tambah Data Pembayaran') || ($title == 'Tabel Data Pembayaran') || ($title == 'Edit Data Pembayaran') || ($title == 'Bayar SPP') ? "show" : " "; ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Menu:</h6>
                     <a class="collapse-item <?= ($title == 'Tambah Data Pembayaran') ? "active" : " "; ?>" href="<?= base_url('pembayaran/create') ?>">Tambah Data</a>
                     <a class="collapse-item <?= ($title == 'Tabel Data Pembayaran') || ($title == 'Edit Data Pembayaran') || ($title == 'Bayar SPP') ? "active" : " "; ?>" href="<?= base_url('pembayaran') ?>">Tabel Data</a>
                 </div>
             </div>
         </li>
     <?php } ?>
     <!-- Nav Item - History -->
     <?php if (session()->get('level') == 'admin' || 'petugas' || 'siswa') { ?>
         <li class="nav-item <?= ($title == 'Riwayat Pembayaran') ? "active" : " "; ?>">
             <a class="nav-link" href="<?= base_url('history') ?>">
                 <i class="las la-history" style="font-size: 20px;"></i>
                 <span>Riwayat</span></a>
         </li>
     <?php } ?>
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
             <!-- Topbar Search -->
             <!-- <div class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <?= $title; ?>
                    </div> -->

             <!-- Topbar Navbar -->
             <ul class="navbar-nav ml-auto">

                 <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                 <div class="nav-item dropdown no-arrow d-sm-none">
                     <p style="margin-top: 25px" class="text-gray-600 medium"><?= session()->get('nama_petugas'); ?></p>
                 </div>


                 <div class="topbar-divider d-none d-sm-block"></div>

                 <!-- Nav Item - User Information -->
                 <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                         <?php if (session()->get('level') == 'siswa') {
                             echo session()->get('nama');
                            }else{
                            echo session()->get('nama_petugas'); 
                            }
                             ?>
                         
                        </span>
                         <img class="img-profile rounded-circle" src="<?= base_url() ?>/gambar/<?= session()->get('foto'); ?>">
                     </a>
                     <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                     <?php if (session()->get('level') == 'admin' || 'petugas') { ?>
                     <a class="dropdown-item" href="<?= base_url('Profile'); ?>">
                             <i class="las la-user mr-2 text-gray-400" style="font-size: 20px;"></i>
                             Profile
                         </a>
                         <a class="dropdown-item" href="<?= base_url('Profile/settings'); ?>">
                             <i class="las la-tools mr-2 text-gray-400" style="font-size: 20px;"></i>
                             Settings
                         </a>
                         <!-- <a class="dropdown-item" href="#">
                             <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                             Activity Log
                         </a> -->
                         <div class="dropdown-divider"></div>
                         <?php } ?>
                         <a class="dropdown-item" style="cursor: pointer;" id="btn-logout">
                             <i class="feather-log-out mr-2 text-gray-400" style="font-size: 16px;"></i>
                             Logout
                         </a>
                     </div>
                 </li>

             </ul>


         </nav>
         <script type='text/javascript'>
             let btnLogout = document.getElementById("btn-logout");
             btnLogout.addEventListener('click', function() {

                 Swal.fire({
                     title: "Keluar",
                     text: "Anda Yakin Ingin Keluar?",
                     icon: "warning",
                     showCancelButton: true,
                    //  confirmButtonColor: '#3085d6',
                       confirmButtonColor: 'var(--moredark)',
                     cancelButtonColor: '#d33',
                     confirmButtonText: 'Iya',
                     cancelButtonText: 'Tidak'
                 }).then((result) => {
                     if (result.value) {
                         Swal.fire(
                             'Berhasil!',
                             'Anda Berhasil Keluar.',
                             'success',
                         );
                         window.setTimeout(function() {
                             window.location.replace('<?= base_url('login/logout') ?>');
                         }, 500);
                     }
                 })

             });
         </script>
         <!-- End of Topbar -->