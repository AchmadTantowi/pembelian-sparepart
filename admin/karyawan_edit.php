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
$nik=$_GET['id'];
$query=mysql_query("SELECT * FROM karyawan where nik='$nik'");
$dataku=mysql_fetch_array($query);
?>
        <div class="right_col" role="main">
        <br />
          <div class="">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form Edit Karyawan</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form class="form-horizontal form-label-left" action="karyawan_edit.php" method="POST">
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">NIK <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" readonly name="nik" required="required" type="text" value="<?php echo $dataku['nik']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name" >Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="nama" required="required" value="<?php echo $dataku['nama']; ?>" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Username <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="username" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $dataku['username']; ?>">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Password <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="password" type="text" ><br>
                        *) jika password tidak diganti kosongkan saja
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Level <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="level" class="form-control col-md-7 col-xs-12">
                            <option value="mekanik" <?php echo ($dataku['level'] == 'mekanik') ? 'selected' : ''; ?>>
                              Mekanik
                            </option>
                            <option value="admin" <?php echo ($dataku['level'] == 'admin') ? 'selected' : ''; ?>>
                              Admin
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
  $nik  = $_POST['nik'];
  $nama  = $_POST['nama'];
  $username  = $_POST['username'];
  $password  = md5($_POST['password']);
  $level  = $_POST['level'];
  $divisi = 'mekanik';

  if(empty($_POST['password'])){
  mysql_query("UPDATE karyawan SET nama='$nama', 
                                    username='$username',
                                    divisi='$divisi',
                                    level='$level'
                                    where nik='$nik'") or die(mysql_error());
  } else {
  mysql_query("UPDATE karyawan SET nama='$nama', 
                                    username='$username',
                                    password='$password',
                                    divisi='$divisi',
                                    level='$level'
                                    where nik='$nik'") or die(mysql_error());
  }
  echo "<script>swal('Success', 'Karyawan Update', 'success');
        window.location=(href='karyawan.php')</script>";
}   

?>
      <?php include 'footer.php'; ?>