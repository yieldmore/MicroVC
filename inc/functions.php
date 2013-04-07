<?php
//Returns SCRIPT_FILENAME (minus filename) [. uri_string]
//if contents are asked for, returns it
function site_file($rel, $contents = false)
{
	global $fileRoot;
	if (!isset($fileRoot))
	{
		$fileRoot = $_SERVER['SCRIPT_FILENAME'];
		$pos = strripos($fileRoot, "/");
		$fileRoot = substr($fileRoot, 0, $pos + 1);
	}
	$rel = $fileRoot . $rel;
	return $contents ? file_get_contents($rel) : $rel;
}

function site_url($rel, $return = 0)
{
	if (!strncmp($rel, 'http://', strlen('http://'))) return $rel;
	global $urlRoot;
	if (!isset($urlRoot))
	{
		$urlRoot = $_SERVER['SCRIPT_NAME'];
		$urlRoot = str_ireplace("index.php", "", $urlRoot);
	}
	$rel = $urlRoot . $rel;
	if ($return) return $rel;
	echo $rel;
}

function site_var($name, $echo = 0)
{
	global $settings;
	$r = isset($settings[$name]) ? $settings[$name] : false;
	if ($echo) echo $r; else return $r;
}

function dump($obj, $die = 0)
{
  echo '<pre>' . print_r($obj, 1) . '</pre>';
  if ($die) die();
}
?>
