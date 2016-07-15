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
            <li><a href="index.php"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="form-request.php"><i class="fa fa-edit"></i>Form Request Sparepart</a></li>
            <li><a href="history.php"><i class="fa fa-file"></i>History Peminjaman</a></li>
        </ul>
    </div>
</div>
<!-- /sidebar menu -->