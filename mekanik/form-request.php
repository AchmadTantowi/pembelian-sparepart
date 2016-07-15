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
                <div class="">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Form Request Sparepart</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <form class="form-horizontal form-label-left" action="form-request.php" method="POST">
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama barang <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="form-control col-md-7 col-xs-12" name="nama_part" id="nama_part" required="required" type="text">
                                                <input type="hidden" class="form-control" name="kode_part" id="kode_part" required/>
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Jumlah <span class="required">*</span>
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
});
</script>
<?php
if(isset($_POST['simpan'])){

$nik = $_SESSION['id'];
$kode_part  = $_POST['kode_part'];
$jumlah  = $_POST['jumlah'];
$status = 'awaiting';

$save = mysql_query("insert into form_request values ('', '$nik', '$kode_part', '$jumlah',$status)") or die (mysql_error());
// echo "<script>swal('Claim terkirim', 'You clicked the button!', 'success');</script>";
if ($save) {
  echo "<script>swal('Success', 'Request send..', 'success');</script>";
}

}
?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <?php include 'footer.php'; ?>