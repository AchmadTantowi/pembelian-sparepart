<?php
error_reporting(0);
include "../config/koneksi.php";  
include "../config/fungsi_indotgl.php";
include "../config/library.php";
$tanggal = tgl_indo(date("Y m d"));
$jam	 = date("H:i:s");
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
// POST tanggal
$tgl_awal = $_POST['tgl_awal'];
$tgl_akhir = $_POST['tgl_akhir'];
$status_request = $_POST['status_request'];

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
	<b><h2>Laporan Request Barang</h2></b>
	<b></b>
	
		<table border='1' width='1100' cellspacing="0" cellpadding="1">
		<thead>
		<tr>
			<th><center>No</center></th>
			<th><center>Nama Karyawan</center></th>
			<th><center>Kode Part</center></th>
			<th><center>Nama Barang</center></th>
			<th><center>Jml Barang</center></th>
			<th><center>Harga</center></th>	
			<th><center>Status</center></th>
		</tr>
		</thead>		
		<tbody>
		<?php
            $nomor=0;
            if($status_request == 'all'){
            $hasil = mysql_query("SELECT * FROM form_request,karyawan,barang where form_request.nik=karyawan.nik and form_request.kode_part=barang.kode_part and date_request between '$tgl_awal' and '$tgl_akhir'");
            }else{
            $hasil = mysql_query("SELECT * FROM form_request,karyawan,barang where form_request.nik=karyawan.nik and form_request.kode_part=barang.kode_part and date_request between '$tgl_awal' and '$tgl_akhir' and form_request.status_request='$status_request'");
        	}
            while ($dataku = mysql_fetch_array($hasil)) {
        ?>
		<tr>
			<td><center><?php echo $nomor=$nomor+1;?></center></td>
			<td><center><?php echo $dataku['nama'];?></center></td>
			<td><center><?php echo $dataku['kode_part'];?></center></td>
			<td><center><?php echo $dataku['nama_part'];?></center></td>
			<td><center><?php echo $dataku['jumlah'];?></center></td>
			<td><center>Rp. <?php echo number_format($dataku['harga']);?></center></td>
			<td><center><?php echo $dataku['status_request'];?></center></td>
		</tr>
		<?php } ?>
		</tbody>
		<tr>
			<td></td>
		</tr>
	</table>
	</td>
  </tr>
    <tr>
    <td>
	    <table width="200" border="0" cellspacing="0" cellpadding="0" align="left">
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
	        <td>Admin </td>
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
			Nama Admin</u></td>
	      </tr>
	      <!-- <tr>
	        <td>NIP. </td>
	      </tr> -->
	    </table>
	    <table width="200" border="0" cellspacing="0" cellpadding="0" align="right">
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
	    </table>
	    <table width="200" border="0" cellspacing="0" cellpadding="0" align="center">
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
	        <td>Manajer </td>
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
			Nama Manajer</u></td>
	      </tr>
	      <!-- <tr>
	        <td>NIP. </td>
	      </tr> -->
	    </table>
    </td>
  	</tr>
  <input class="noPrint" type="button" value="Print" onclick="window.print()">
</table>