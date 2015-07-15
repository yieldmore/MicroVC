<?php
$db['environment'] = $_SERVER['REMOTE_ADDR'] == 'localhost' ? 'dev' : 'web';
config_db('localhost', $safe['localuser'], $safe['localpwd'], 'tree', 'dev');
config_db('localhost', $safe['webuser'], $safe['webpwd'], 'cselian_tree', 'web');

$settings['singlemodule'] = 1;
$settings['site_name'] = 'MicroViC';
$settings['site_copy'] = '&copy; %s cselian.com / Imran Ali Namazi.';
$settings['site_title'] = 'Family Tree Website';
$settings['family1'] = array('2007 version' => 'http://namazitree.cselian.com');

?>
