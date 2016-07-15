<?php
error_reporting(0);
include '../cek_login.php';
include '../config/koneksi.php';

$term = $_GET['term'];

$query = mysql_query("select * from barang where nama_part like '%".$term."%'");
$json = array();
while($barang = mysql_fetch_array($query)){
    $json[] = array(
        'label' => $barang['nama_part'], // text sugesti saat user mengetik di input box
        'value' => $barang['nama_part'], // nilai yang akan dimasukkan diinputbox saat user memilih salah satu sugesti
        'kode_part' => $barang['kode_part']
    );
}
header("Content-Type: text/json");
echo json_encode($json);
?> 