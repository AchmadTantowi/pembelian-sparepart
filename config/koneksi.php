<?php
$server = "localhost"; 
$username = "root";  
$password = ""; 
$database = "pembelian_sparepart";
$konek = mysql_connect($server, $username, $password) or die ("Gagal konek ke server MySQL" .mysql_error());
$bukadb = mysql_select_db($database) or die ("Gagal membuka database $database" .mysql_error());
?>