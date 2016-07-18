<?php 
error_reporting(0);
include '../config/koneksi.php';

$kode_part = $_GET['id'];
$query = mysql_query("delete from barang where kode_part='$kode_part'") or die(mysql_error());
if ($query) {
?>
<script language="JavaScript">
alert('Data customer berhasil dihapus');
document.location='barang.php';
</script>
<?php
}
?>