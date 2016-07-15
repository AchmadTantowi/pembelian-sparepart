<?php include 'head.php';?>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Gentellela Alela!</span></a>
          </div>
          <div class="clearfix"></div>
            <?php include 'sidebar.php';?>
        </div>
      </div>
        <?php include 'navbar.php';?>  
        <!-- page content -->
        <div class="right_col" role="main">
        <br />
<?php
$id_request = $_GET['id'];
$query = mysql_query("SELECT * FROM form_request,barang where form_request.kode_part=barang.kode_part and form_request.id_request='$id_request'");
$data = mysql_fetch_array($query);
?>
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Request Sparepart</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" action="request_edit.php" method="POST">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama barang <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="nama_part" id="nama_part" required="required" type="text" value="<?php echo $data['nama_part']; ?>">
                          <input type="hidden" class="form-control" name="kode_part" value="<?php echo $data['kode_part']; ?>" required/>
                          <input type="hidden" class="form-control" name="id_request" value="<?php echo $data['id_request']; ?>" required/>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Jumlah <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="jumlah" required="required" value="<?php echo $data['jumlah']; ?>" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Status <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="status_request" class="form-control">
                            <option value="awaiting" <?php echo ($data['status_request'] == 'awaiting') ? 'selected' : ''; ?>>
                              Awaiting
                            </option>
                            <option value="accept" <?php echo ($data['status_request'] == 'accept') ? 'selected' : ''; ?>>
                              Accept
                            </option>
                          </select>
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
  $id_request  = $_POST['id_request'];
  $status_request = $_POST['status_request'];
  $jumlah = $_POST['jumlah'];

  $getStock = mysql_query("select * from barang where kode_part='$kode_part'");
  $getSum = mysql_fetch_array($getStock);
  $stock = $getSum['stok'];
  $updateStock = $stock - $jumlah;

  if($stock < $jumlah) {
    echo "<script>sweetAlert('Oops...', 'Stok barang tidak ada!', 'error');
        window.location=(href='request.php')</script>";
  } elseif($status_request == "accept") {
    mysql_query("UPDATE form_request SET status_request ='$status_request'
                    WHERE id_request ='$id_request'") or die(mysql_error());
    
    mysql_query("UPDATE barang SET stok ='$updateStock'
                    WHERE kode_part ='$kode_part'") or die(mysql_error());

    echo "<script>swal('Success', 'Request accept..', 'success');
    window.location=(href='request.php')</script>";
  } else {
    echo "<script>sweetAlert('Oops...', 'Something went wrong!', 'error');
        window.location=(href='request.php')</script>";
  }
  
}   

?>
      <?php include 'footer.php'; ?>