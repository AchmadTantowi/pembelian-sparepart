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
                    <h2>Form Tambah Karyawan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" action="karyawan_tambah.php" method="POST">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">NIK <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="nik" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="nama" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="username" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="password" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Level <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="level" class="form-control col-md-7 col-xs-12">
                            <option value="mekanik">Mekanik</option>
                            <option value="admin">Admin</option>
                          </select>
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
  $nik  = $_POST['nik'];
  $nama  = $_POST['nama'];
  $username  = $_POST['username'];
  $password  = md5($_POST['password']);
  $level  = $_POST['level'];
  $divisi = 'mekanik';

  $getKaryawan = mysql_query("select nik from karyawan where nik='$nik'");
  $getCount = mysql_num_rows($getKaryawan);
  if ($getCount >= 1) {
    echo "<script>sweetAlert('Oops...', 'Nik sudah ada!', 'error');
    window.location=(href='karyawan.php')</script>";
  }

  mysql_query("insert into karyawan values ('$nik', '$nama', '$username', '$password','$divisi','$level')") or die (mysql_error());
  echo "<script>swal('Success', 'Karyawan Saved', 'success');
  window.location=(href='karyawan.php')</script>";

  
}   

?>
      <?php include 'footer.php'; ?>