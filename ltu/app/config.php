<?php
$db['environment'] = $_SERVER['HTTP_HOST'] == 'localhost' ? 'dev' : 'web';
config_db('localhost', 'root', '', 'ltu', 'dev');
config_db('localhost', 'fgcdbjqo_user', 'user1', 'fgcdbjqo_ltu', 'web');

$settings['bucketaction'] = 'pages';
$settings['singlemodule'] = 1;
$settings['site_name'] = 'LTU Online';
$settings['site_copy'] = '&copy; %s http://ltu-onlinelab.ir / Ali Khoshbin.';
$settings['site_title'] = 'LTU Online InfoSec Lab';
?>
