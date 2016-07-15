<?php
$id_request = 2;
$status = 'accept';

$query = mysql_query("UPDATE form_request SET status_request='$status'
                                                    where id_request='$id_request'") or die(mysql_error());

?>