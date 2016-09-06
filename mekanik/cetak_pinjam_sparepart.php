<?php
error_reporting(0);
include "../config/koneksi.php";  
// include "../config/fungsi_indotgl.php";
// include "../config/library.php";
// $tanggal = tgl_indo(date("Y m d"));
// $jam	 = date("H:i:s");
?>
<style type="text/css">
@media print {
input.noPrint { display: none; }
}


body{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
.tbl{
	font-family: Arial, Helvetica, sans-serif;
	font-size: 9px;
	color: #000000;
}
.lap1 {
	border-top:#000000 1px solid;
	border-left:#000000 1px solid;
	border-bottom:#000000 1px solid;
}
.lap2 {
	border-top:#000000 1px solid;
	border-left:#000000 1px solid;
	border-left:#000000 1px solid;
	border-bottom:#000000 1px solid;
}
.lap3 {
	border-left:#000000 1px solid;
	border-bottom:#000000 1px solid;	
}
.lap4 {
	border-left:#000000 1px solid;
	border-left:#000000 1px solid;
	border-bottom:#000000 1px solid;	
}
</style>
<script language='JavaScript' type='text/javascript'>
window.print();
</script>
<?php
$id_request = $_GET['id'];

?>
<table width="600" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3">
	<center>
		<img src="../images/logo_tuntex2.png">
	</center>
	</td>
  </tr>
  <tr>
	<td align="center" colspan="3"></td>	
  </tr>
  <tr>
    <td colspan="3" align="center"><hr></td>
  </tr>
  <tr>
    <td colspan="3" align="center">
	<b><h2>Form Request Barang</h2></b>
	<b></b>
	
		<table border='1' width='1100' cellspacing="0" cellpadding="1">
		<thead>
		<tr>
			<th>No</th>
	        <th>Nama barang </th>
            <th>Jumlah </th>
            <th>Status </th>
		</tr>
		</thead>		
		<tbody>
		<?php
            $nomor=0;
            $hasil = mysql_query("SELECT * FROM barang,form_request where barang.kode_part=form_request.kode_part and form_request.id_request='$id_request'");
            while ($dataku = mysql_fetch_array($hasil)) {
        ?>
		<tr>
			<td><center><?php echo $nomor=$nomor+1;?></center></td>
			<td class=" "><center><?php echo $dataku['nama_part'];?></center></td>
            <td class=" "><center><?php echo $dataku['jumlah'];?></center></td>
            <td class=" "><center><?php echo $dataku['status_request'];?></center></td>
		</tr>
		<?php } ?>
		</tbody>
	</table>
	</td>
  </tr>
    <tr>
    <td><table width="200" border="0" cellspacing="0" cellpadding="0" align="right">
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Tangerang, <?=date("d-m-Y"); ?></td>
      </tr>
      <tr>
        <td>Supervisor </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><u>
		Nama Supervisor</u></td>
      </tr>
      <!-- <tr>
        <td>NIP. </td>
      </tr> -->
    </table></td>
  </tr>
  <input class="noPrint" type="button" value="Print" onclick="window.print()">
</table>