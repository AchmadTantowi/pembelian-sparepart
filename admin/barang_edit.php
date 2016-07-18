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
<?php
$kode_part=$_GET['id'];
$query=mysql_query("SELECT * FROM barang where kode_part='$kode_part'");
$dataku=mysql_fetch_array($query);
?>
        <div class="right_col" role="main">
        <br />
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Edit Barang</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" action="barang_edit.php" method="POST">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Kode part <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="kode_part" readonly required="required" type="text" value="<?php echo $dataku['kode_part']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama part <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="nama_part" required="required" type="text" value="<?php echo $dataku['nama_part']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Stok <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="stok" required="required" value="<?php echo $dataku['stok']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Harga <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="harga" value="<?php echo $dataku['harga']; ?>" required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <input type="submit" name="update" value="Update" class="btn btn-primary">
                      <input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-default"><br>
                     </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
<?php
if(isset($_POST['update'])){
  $kode_part  = $_POST['kode_part'];
  $nama_part  = $_POST['nama_part'];
  $stok  = $_POST['stok'];
  $harga  = $_POST['harga'];

  $getBarang = mysql_query("select kode_part from barang where kode_part='$kode_part'");
  $getCount = mysql_num_rows($getBarang);
  if ($getCount >= 1) {
    echo "<script>sweetAlert('Oops...', 'Barang sudah ada!', 'error')</script>";
  }

  mysql_query("UPDATE barang SET nama_part='$nama_part', 
                                    stok='$stok',
                                    harga='$harga'
                                    where kode_part='$kode_part'") or die(mysql_error());
  echo "<script>swal('Success', 'Barang Update', 'success');
        window.location=(href='barang.php')</script>";
}   

?>
      <?php include 'footer.php'; ?>