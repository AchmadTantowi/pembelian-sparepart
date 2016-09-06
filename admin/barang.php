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
                    <h2>Data Barang</h2>
                    <div class="clearfix"></div>
                </div>
                <a href="barang_tambah.php" class="btn btn-primary">+ Tambah Barang</a>
                <div style="margin-bottom:15px;" align="right">
                  <form action="" method="post">
                   <input type="text" name="input_cari" placeholder="Cari Berdasar Nama Part" class="css-input" style="width:250px;" />
                   <input type="submit" name="cari" value="Cari" class="btn" style="padding:3px;" margin="6px;" width="50px;"  />
                   <a href="barang.php" class="btn" style="padding:3px;" margin="6px;" width="50px;">View All</a>
                  </form>
                 </div>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>No</th>
                                <th>Kode Part </th>
                                <th>Nama Part </th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th class=" no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $input_cari = $_POST['input_cari']; 
                           $cari = $_POST['cari'];
                           if($cari) {

                            if($input_cari != "") {
                            $sql = mysql_query("select * from barang where nama_part like '%$input_cari%'") or die (mysql_error());   
                            } else {
                            $sql = mysql_query("select * from barang") or die (mysql_error());
                            }
                            } else {
                            $sql = mysql_query("select * from barang") or die (mysql_error());
                            }
                            $cek = mysql_num_rows($sql);
                           if($cek < 1) {
                            ?>
                             <tr> 
                              <td colspan="7" align="center style="padding:10px;""> Data Tidak Ditemukan</td>
                             </tr>
                            <?php
                           } else {
                            $nomor=1;
                            $hasil = mysql_query("SELECT * FROM barang");
                            while ($dataku = mysql_fetch_array($sql)) {
                        ?>
                            <tr class="even pointer">
                                <td class=" "><?php echo $nomor++;?></td>
                                <td class=" "><?php echo $dataku['kode_part'];?></td>
                                <td class=" "><?php echo $dataku['nama_part'];?></td>
                                <td class=" "><?php echo $dataku['stok'];?></td>
                                <td class=" ">Rp. <?php echo format_angka($dataku['harga']);?></td>
                                <td class=" last">
                                    <a href="barang_edit.php?id=<?php echo $dataku['kode_part']; ?>">Edit</a> |
                                    <a href="barang_hapus.php?id=<?php echo $dataku['kode_part']; ?>">Hapus</a>
                                </td>
                            </tr>
                        <?php
                            }}
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>