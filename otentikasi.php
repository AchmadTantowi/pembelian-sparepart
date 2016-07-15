<?php
include 'config/koneksi.php';
//Fungsi anti injeksi
function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}
session_start();

//tangkap data dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);

//untuk mencegah sql injection
$username = antiinjection($username);
$password = antiinjection($password);

//QUERY ADMIN
$loginadmin = mysql_query("select * from karyawan where username='$username' and password='$password'");
$q = mysql_fetch_array($loginadmin);

	if (mysql_num_rows($loginadmin) == 1) {
		//SESSION	
		$_SESSION['id'] 	  = $q['nik'];
		$_SESSION['username'] = $q['username'];
		$_SESSION['password'] = $q['password'];
		$_SESSION['nama'] 	  = $q['nama'];	
		$_SESSION['level'] 	  = $q['level'];
		//redirect ke halaman index
		if($_SESSION['level'] == 'admin'){
			header('location:admin/index.php');
		}else{
			header('location:mekanik/index.php');
		}			
	}	
	
else {
	//kalau username ataupun password tidak terdaftar di database
	header('location:index.php?error=1');
}
?>