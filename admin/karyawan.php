<?php include 'head.php';?>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.php" class="site_title"><img src="../images/logo_tuntex.jpg" width="50px" height="50px"> <span></span></a>
                    </div>
                    <div class="clearfix"></div>
<?php include 'sidebar.php';?>
                </div>
            </div>
<?php include 'navbar.php';?>  
<!-- page content -->
<div class="right_col" role="main">
<br />
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Karyawan</h2>
                    <div class="clearfix"></div>
                </div>
                <a href="karyawan_tambah.php" class="btn btn-primary">+ Tambah Karyawan</a>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>No</th>
                                <th>NIK </th>
                                <th>Nama </th>
                                <th>Username </th>
                                <th>Divisi </th>
                                <th class=" no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $nomor=1;
                            $hasil = mysql_query("SELECT * FROM karyawan");
                            while ($dataku = mysql_fetch_array($hasil)) {
                        ?>
                            <tr class="even pointer">
                                <td class=" "><?php echo $nomor++;?></td>
                                <td class=" "><?php echo $dataku['nik'];?></td>
                                <td class=" "><?php echo $dataku['nama'];?></td>
                                <td class=" "><?php echo $dataku['username'];?></td>
                                <td class=" "><?php echo $dataku['divisi'];?></td>
                                <td class=" last">
                                    <a href="karyawan_edit.php?id=<?php echo $dataku['nik']; ?>">Edit</a> |
                                    <a href="karyawan_hapus.php?id=<?php echo $dataku['nik']; ?>">Hapus</a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>