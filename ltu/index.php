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
include_once 'inc/bootstrap.php';
include_once 'app/model.php';

$controller = getController();
extract($controller->data);

if (!$controller->ajax) include $settings['templatefol'] . 'header.php';
include_once $controller->view;
$time = timer_end();
if (!$controller->ajax) include $settings['templatefol'] . 'footer.php';
?>
