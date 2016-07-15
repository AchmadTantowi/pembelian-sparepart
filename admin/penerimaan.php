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
                    <h2>Data Penerimaan</h2>
                    <div class="clearfix"></div>
                </div>
                <a href="penerimaan_tambah.php" class="btn btn-primary">+ Tambah Penerimaan Barang</a>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>No</th>
                                <th>No. Invoice</th>
                                <th>Kode Part</th>
                                <th>Nama Barang</th>
                                <th>Suplier</th>
                                <th>Jml Barang</th>
                                <!-- <th class=" no-link last"><span class="nobr">Action</span>
                                </th> -->
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $nomor=1;
                            $hasil = mysql_query("SELECT * FROM penerimaan,barang,suplier where penerimaan.kode_part=barang.kode_part and penerimaan.id_suplier=suplier.id_suplier");
                            while ($dataku = mysql_fetch_array($hasil)) {
                        ?>
                            <tr class="even pointer">
                                <td class=" "><?php echo $nomor++;?></td>
                                <td class=" "><?php echo $dataku['no_invoice'];?></td>
                                <td class=" "><?php echo $dataku['kode_part'];?></td>
                                <td class=" "><?php echo $dataku['nama_part'];?></td>
                                <td class=" "><?php echo $dataku['nama_suplier'];?></td>
                                <td class=" "><?php echo $dataku['jml_barang'];?></td>
                                <!-- <td class=" last">
                                    <a href="barang_edit.php?id=<?php echo $dataku['no_kartu']; ?>">Edit</a> |
                                    <a href="barang_hapus.php?id=<?php echo $dataku['no_kartu']; ?>">Hapus</a>
                                </td> -->
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