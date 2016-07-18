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
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Tambah Suplier</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" action="suplier_tambah.php" method="POST">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Suplier <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="nama_suplier" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="alamat" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Telepon <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="telp" required="required" type="text">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                      <input type="button" name="kembali" value="Kembali" onClick="javascript:history.back()" class="btn btn-default"><br>
                     </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
<?php
if(isset($_POST['simpan'])){
  $nama_suplier  = $_POST['nama_suplier'];
  $alamat  = $_POST['alamat'];
  $telp  = $_POST['telp'];

  // $getSuplier = mysql_query("select kode_part from barang where kode_part='$kode_part'");
  // $getCount = mysql_num_rows($getSuplier);
  // if ($getCount >= 1) {
  //   echo "<script>sweetAlert('Oops...', 'Barang sudah ada!', 'error')</script>";
  // }

  mysql_query("insert into suplier values ('', '$nama_suplier', '$alamat', '$telp')") or die (mysql_error());
  echo "<script>swal('Success', 'Suplier Saved', 'success')</script>";

  
}   

?>
      <?php include 'footer.php'; ?>