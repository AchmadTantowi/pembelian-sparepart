<?php
error_reporting(0);
include '../cek_login.php';
include '../config/koneksi.php';

$term = $_GET['term'];

$query = mysql_query("select * from suplier where nama_suplier like '%".$term."%'");
$json = array();
while($suplier = mysql_fetch_array($query)){
    $json[] = array(
        'label' => $suplier['nama_suplier'], // text sugesti saat user mengetik di input box
        'value' => $suplier['nama_suplier'], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
        'id_suplier' => $suplier['id_suplier']
    );
}
header("Content-Type: text/json");
echo json_encode($json);
?> 