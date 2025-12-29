 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
         <div class="sidebar-brand-icon rotate-n-15">
             <i class="fas fa-laugh-wink"></i>
         </div>
         <div class="sidebar-brand-text mx-3">Admin</div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="{{ route('admin.dashboard') }}">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Dashboard</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
        Data Master
     </div>

     <li class="nav-item">
         <a class="nav-link" href="">
             <i class="fas fa-fw fa-folder"></i>
             <span>User</span></a>
     </li>

     <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.jabatan.index') }}">
             <i class="fas fa-fw fa-folder"></i>
             <span>Jabatan & Kandidat</span></a>
     </li>

     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Fuzzy Logic
     </div>

     <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.kriteria.index') }}">
             <i class="fas fa-fw fa-folder"></i>
             <span>Kriteria & Himpunan Fuzzy</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.aturan.index') }}">
             <i class="fas fa-fw fa-folder"></i>
             <span>Aturan Fuzzy</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.alternatif.jabatan') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Penilaian Alternatif</span>
         </a>
     </li>
     <li class="nav-item">
         <a class="nav-link" href="{{ route('admin.perhitungan.jabatan') }}">
             <i class="fas fa-fw fa-chart-area"></i>
             <span>Perhitungan</span>
         </a>
     </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.hasil.jabatan') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>Hasil Seleksi</span>
            </a>
     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>


 </ul>
