<?php
$rdp = $_GET['rdp'];
header('Content-Type: application/rdp; charset=utf-8');
header('Content-Disposition: attachment; filename='.$rdp.'.rdp');
echo file_get_contents($rdp . '.rdp');
?>