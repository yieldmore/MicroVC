<?php
/**
 * MicroViC
 *
 * An open source application development framework for PHP / mysql.
 *
 * @package     MicroViC - The smallest View / Controller engine.
 * @author      Imran Ali Namazi
 * @copyright   Copyright (c) 2012, Cselian Technology Group
 * @license	    http://tg.cselian.com/apps/mvc/help/license
 * @link        http://tg.cselian.com/apps/mvc/
*/
include_once '../inc/bootstrap.php';

//RewriteRule ([a-zA-Z0-9,_-]+)/([a-zA-Z0-9,_-]+)/([a-zA-Z0-9,_-]+) index.php?action=$1&param1=$2&param2=$3
//RewriteRule ([a-zA-Z0-9,_-]+)/([a-zA-Z0-9,_-]+) index.php?action=$1&param1=$2

$controller = getController();
extract($controller->data);

if (!$controller->ajax) include $settings['templatefol'] . 'header.php';
include_once $controller->view;
$time = timer_end();
if (!$controller->ajax) include $settings['templatefol'] . 'footer.php';
?>
