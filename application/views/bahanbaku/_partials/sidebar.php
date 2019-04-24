<!-- Sidebar -->
<ul class="sidebar navbar-nav">

    <!-- <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Bahan Baku</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('AdminBahanBaku/bahanBaku/new') ?>">New Bahan Baku</a>
            <a class="dropdown-item" href="<?php echo site_url('AdminBahanBaku/bahanBaku/list') ?>">List Bahan Baku</a>
        </div>
    </li> -->

    <li class="nav-item <?php echo $this->uri->segment(2) == 'request' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('AdminBahanBaku/request') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Request</span></a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'daftar' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('AdminBahanBaku/daftar') ?>">
            <i class="fas fa-fw fa-boxes"></i>
            <span>List Stok</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-cog"></i>
            <span>Produksi</span></a>
    </li>
</ul>
