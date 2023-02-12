
  <div class="sidebar close">
    <div class="logo-details">
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Perpustakaan</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Category</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Master Data</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Master Data</a></li>
          <li><a href="http://localhost/library/admin/master_data/data_anggota/index.php">Data Anggota</a></li>
          <li><a href="http://localhost/library/admin/master_data/data_admin/index.php">Data Admin</a></li>
          <li><a href="http://localhost/library/admin/master_data/data_peminjaman/index.php">Data Peminjaman</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Katalog Buku</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Katalog Buku</a></li>
          <li><a href="http://localhost/library/admin/katalog_buku/data_buku/index.php">Data Buku</a></li>
          <li><a href="http://localhost/library/admin/katalog_buku/data_kategori/index.php">Data Kategori</a></li>
          <li><a href="http://localhost/library/admin/katalog_buku/data_penerbit/index.php">Data Penerbit</a></li>
        </ul>
      </li>
      <li>
        <a href="http://localhost/library/admin/laporan_perpustakaan/index.php">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="link_name">Laporan Perpustakaan</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="http://localhost/library/admin/laporan_perpustakaan/index.php">Laporan Perpustakaan</a></li>
        </ul>
      </li>
      <li>
        <a href="peminjaman.php">
          <i class='bx bx-line-chart' ></i>
          <span class="link_name">Peminjaman</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Chart</a></li>
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-plug' ></i>
            <span class="link_name">Plugins</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="#">Plugins</a></li>
          <li><a href="#">UI Face</a></li>
          <li><a href="#">Pigments</a></li>
          <li><a href="#">Box Icons</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-compass' ></i>
          <span class="link_name">Explore</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Explore</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-history'></i>
          <span class="link_name">History</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">History</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="link_name">Setting</span>
        </a>
        <ul class="sub-menu blank">
          <li><a class="link_name" href="#">Setting</a></li>
        </ul>
      </li>
      <li>
    <div class="profile-details">
      <div class="profile-content">
        <!--<img src="image/profile.jpg" alt="profileImg">-->
      </div>
      <div class="name-job">
        <div class="profile_name"><?= $data_user["fullname"] ?></div>
        <div class="job"><?= $data_user["kelas"] ?></div>
      </div>
      <a href="http://localhost/library/logout.php"><i class='bx bx-log-out'></i></a>
    </div>
  </li>
</ul>
  </div>
  
  
  
