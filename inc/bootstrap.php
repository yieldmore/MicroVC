<?php
session_start();

function timer_start() {
	global $began;
	$mtime = explode( ' ', microtime() );
	$began = $mtime[1] + $mtime[0];
}
timer_start();

function timer_end()
{
	global $began;
	$mtime = microtime(); $mtime = explode( ' ', $mtime );
	$done = $mtime[1] + $mtime[0]; $taken = $done - $began;
	$tim = number_format($taken, 3); //3 = precision

	return sprintf("%s secs", $tim);
}


function _getAction()
{
  if (isset($_GET['action']) == false || $_GET['action'] == '')
    return array('home');
  
  $data = explode('/', $_GET['action']);
  return $data;
}

$actions = _getAction();
//url rewriting everything to index.php negates this check in each file: if ( ! defined('ENGINE')) exit('No direct script access allowed');
if (strpos($actions[count($actions) - 1], '.')) die("illegal characters in path");

//Initialize Config
$db = array();
include_once 'local.php'; // for $safe data that doesnt make it to a public svn
function config_db($host, $uname, $pwd, $dbname, $environment = null)
{
	global $db;
	if (isset($db['environment']) && $db['environment'] != $environment) return;
	$db['hostname'] = $host;
	$db['username'] = $uname;
	$db['password'] = $pwd;
	$db['database'] = $dbname;
}

$settings = array();

include_once 'app/config.php';

//Add Defaults
if (!isset($settings['template'])) $settings['template'] = 'default';
$settings['templatefol'] = sprintf('app/templates/%s/', $settings['template']);

if (isset($db['hostname'])) include_once 'db.php';
include_once 'functions.php';
include_once 'controller.php';

if (isset($settings['includes']))
  foreach ($settings['includes'] as $inc) include_once 'app/' . $inc . '.php';

// Finds the controller, runs the appropriate method based on the action and sets the view (file path)
function getController()
{
  global $actions, $settings;
  include_once 'app/actions.php';

  $singlemodule = isset($settings['singlemodule']);
  $bucketAction = isset($settings['bucketaction']) ? $settings['bucketaction'] : false;
  $controller = new Actions();
  $actionName = $actions[0]; if (!$singlemodule && isset($actions[1]) && $actions[1] != 'index' && $actions[1] != '') $actionName .= '_' . $actions[1];

  if ($bucketAction && !method_exists($controller, $actionName))
  {
    if (isset($actions[1]))
      call_user_func_array( array( $controller, $bucketAction), array($actionName, $actions[1]));
    else
      call_user_func_array( array( $controller, $bucketAction), array($actionName));
  }
  else if (count($actions) > $singlemodule ? 1 : 2)
  {
    $pars = array_reverse($actions);
    array_pop($pars);
    if (!$singlemodule) array_pop($pars); // remove first 2
    $pars = array_reverse($pars);
    call_user_func_array( array( $controller, $actionName), $pars);
  }
  else
  {
    call_user_func( array( $controller, $actionName));
  }

  if ($controller->view == null)
    $controller->set_view($actionName);
  
  include_once 'view.php';
  $controller->data['head'] = get_head($controller->head);
  
  return $controller;
}
?>
