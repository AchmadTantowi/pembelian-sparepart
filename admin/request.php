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
                    <h2>Data Request</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>No</th>
                                <th>Nama Karyawan </th>
                                <th>Nama Part </th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th class=" no-link last"><span class="nobr">Action</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $nomor=1;
                            $hasil = mysql_query("SELECT * FROM barang,karyawan,form_request where barang.kode_part=form_request.kode_part and karyawan.nik=form_request.nik");
                            while ($dataku = mysql_fetch_array($hasil)) {
                        ?>
                            <tr class="even pointer">
                                <td class=" "><?php echo $nomor++;?></td>
                                <td class=" "><?php echo $dataku['nama'];?></td>
                                <td class=" "><?php echo $dataku['nama_part'];?></td>
                                <td class=" "><?php echo $dataku['jumlah'];?></td>
                                <td class=" ">
                                    <?php
                                    if($dataku['status_request'] == 'awaiting'){
                                        echo "<button class='btn btn-default'>Awating</button>";
                                    }elseif($dataku['status_request'] == 'accept'){
                                        echo "<button class='btn btn-success'>Accept</button>";
                                    }else{
                                        echo "<button class='btn btn-primary'>Canceled</button>";
                                    }
                                    ?>
                                </td>
                                <td class=" last">
                                    <a href="request_edit.php?id=<?php echo $dataku['id_request']; ?>">Change</a> 
                                    <!-- |
                                    <a href="request_delete.php?id=<?php echo $dataku['id_request']; ?>">Delete</a> -->
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