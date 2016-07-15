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
                                    <h2>Form Penerimaan Barang</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-horizontal form-label-left" action="penerimaan_tambah.php" method="POST">
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">No. Invoice <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="no_invoice" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama barang <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" name="nama_part" id="nama_part" required="required" type="text">
                                                <input type="hidden" class="form-control" name="kode_part" id="kode_part" required/>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama suplier <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" name="nama_suplier" id="nama_suplier" required="required" type="text">
                                                <input type="hidden" class="form-control" name="id_suplier" id="id_suplier" required/>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Jumlah barang<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input type="text" name="jumlah" required="required" class="form-control col-md-7 col-xs-12">
                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3">
                                                <button type="submit" name="simpan" class="btn btn-success">Submit</button>
                                                
                                            </div>
                                        </div>
                                     </form>
<!-- autocomplete -->
<script src="../js/jquery-1.10.2.js"></script>
<script src="../js/jquery-ui-1.10.0.custom.js"></script>
<!--end autocomplete -->

<script>
$(document).ready(function(){

  var ac_config = {
      source: "barang_cari.php",
      select: function(event, ui){
          $("#nama_part").val(ui.item.nama_part);
          $("#kode_part").val(ui.item.kode_part);
      },
      minLength:1
  };
  $("#nama_part").autocomplete(ac_config);

  var ac_config2 = {
      source: "suplier_cari.php",
      select: function(event, ui){
          $("#nama_suplier").val(ui.item.nama_suplier);
          $("#id_suplier").val(ui.item.id_suplier);
      },
      minLength:1
  };
  $("#nama_suplier").autocomplete(ac_config2);

});
</script>
<?php
if(isset($_POST['simpan'])){

$no_invoice  = $_POST['no_invoice'];
$kode_part  = $_POST['kode_part'];
$id_suplier  = $_POST['id_suplier'];
$jumlah  = $_POST['jumlah'];

$getStock = mysql_query("select * from barang where kode_part='$kode_part'");
$getSum = mysql_fetch_array($getStock);
$stock = $getSum['stok'];
$updateStock = $stock + $jumlah;

mysql_query("insert into penerimaan values ('$no_invoice', '$kode_part', '$id_suplier', '$jumlah')") or die (mysql_error());

mysql_query("UPDATE barang SET stok ='$updateStock'
                    WHERE kode_part ='$kode_part'") or die(mysql_error());

echo "<script>swal('Success', 'Barang berhasil disimpan', 'success');</script>";


}
?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <?php include 'footer.php'; ?>