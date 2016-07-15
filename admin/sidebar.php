<!-- menu prile quick info -->
<div class="profile">
    <div class="profile_pic">
        <img src="../images/img.jpg" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
        <span>Welcome,</span>
        <h2><?php echo $_SESSION['nama'];?></h2>
    </div>
</div>
<!-- /menu prile quick info -->

<br />
<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a>
            </li>
            <li><a><i class="fa fa-edit"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="karyawan.php">Karyawan</a>
                    </li>
                    <li><a href="barang.php">Barang</a>
                    </li>
                    <li><a href="suplier.php">Suplier</a>
                    </li>
                </ul>
            </li>
            <li><a><i class="fa fa-folder-open"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none">
                    <li><a href="general_elements.html">Pembelian</a>
                    </li>
                    <li><a href="request.php">Request Barang</a>
                    </li>
                    <li><a href="typography.html">Penerimaan</a>
                    </li>
                </ul>
            </li>
            <li><a href="laporan.php"><i class="fa fa-file"></i> Laporan</a></li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->