<?php 
error_reporting(0);
include '../config/koneksi.php';

$nik = $_GET['id'];
$query = mysql_query("delete from karyawan where nik='$nik'") or die(mysql_error());
if ($query) {
?>
<script language="JavaScript">
alert('Data karyawan berhasil dihapus');
document.location='karyawan.php';
</script>
<?php
}
?>