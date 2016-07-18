<?php 
error_reporting(0);
include '../config/koneksi.php';

$id_suplier = $_GET['id'];
$query = mysql_query("delete from suplier where id_suplier='$id_suplier'") or die(mysql_error());
if ($query) {
?>
<script language="JavaScript">
alert('Data suplier berhasil dihapus');
document.location='suplier.php';
</script>
<?php
}
?>